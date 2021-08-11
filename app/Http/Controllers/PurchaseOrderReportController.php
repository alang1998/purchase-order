<?php

namespace App\Http\Controllers;

use anyHelper;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Auth;
use App\Exports\PurchaseOrderReportExport;

class PurchaseOrderReportController extends Controller
{
    /**
     * Get named route
     *
     */
    private function getRoute() {
        return 'purchase_order.report';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $orders = $this->getPurchaseOrder(request()->startDate, request()->endDate ,request()->get('supplierId'));
            return datatables()->of($orders)
                ->addColumn('action', function($data){
                    $button = '<a href="'.route('purchase_order.report.show', $data).'" class="btn btn-sm btn-primary mr-1" target="_BLANK"><i class="fa fa-search"></i></a>';

                    if (Auth::user()->role_id == 2) {
                        $button .= '<a href="'.route('purchase_order.printOrder', $data).'" class="btn btn-sm btn-success mr-1" target="_BLANK"><i class="fa fa-print"></i></a>';
                    }

                    return $button;
                })
                ->addColumn('order_date', function($data){
                    return simpleDate($data->order_date);
                })
                ->addColumn('status', function($data){
                    $status = 0;
                    $quantity = 0;

                    foreach ($data->detail_orders as $detail_order) {
                        $status += anyHelper::getQuantityReceipt($detail_order);
                        $quantity += $detail_order->quantity;                        
                    }

                    if ($status == $quantity) {
                        $text = '<span class="badge badge-success">Sudah Datang</span>';
                    } else if ($status > 0) {
                        $text = '<span class="badge badge-warning">Belum Lengkap</span>';
                    } else {
                        $text = '<span class="badge badge-primary">Belum Datang</span>';
                    }

                    return $text;

                })
                ->addColumn('user', function($data){
                    return $data->user->name;
                })
                ->addColumn('store', function($data){
                    return $data->store->name;
                })
                ->addColumn('total', function($data){
                    $details = $data->detail_orders;
                    $total = 0;
                    if ($details) {
                        foreach ($details as $key => $detail_order) {
                            $total += $detail_order->quantity*$detail_order->price;
                        }
                    }

                    return 'Rp. '.number_format($total, '0', '', '.').'';
                })
                ->addIndexColumn()
                ->rawColumns(['action', 'status'])
                ->make(true);
            
                return $a = 1;
        }
        return view('pages.purchase_order.report.index', [
            'title' => 'Laporan Rekap Pembelian Barang'
        ]);
    }

    public function getPurchaseOrder($startDate, $endDate, $supplierId)
    {
        if ($startDate && $endDate && $supplierId) {
            $orders = PurchaseOrder::where('supplier_id', $supplierId)->whereBetween('order_date', [$startDate, $endDate])->where('status', '1')->get();
        } else if ($startDate && $endDate) {
            $orders = PurchaseOrder::whereBetween('order_date', [$startDate, $endDate])->where('status', '1')->get();
        } else {
            $orders = PurchaseOrder::where('supplier_id', $supplierId)->where('status', '1')->get();
        }

        return $orders;
    }

    public function getReports()
    {
        $supplier = Supplier::find(request('supplierId'));
        $orders = $this->getPurchaseOrder(request()->startDate, request()->endDate, request()->get('supplierId'));
        
        try {

            if (count($orders) > 0) {

                $grandTotal = 0;
                $grandTotalTonase = 0;

                foreach ($orders as $order) {

                    foreach ($order->detail_orders as $detail_order) {
                        
                        $grandTotal += $detail_order->quantity * $detail_order->price;
                        $grandTotalTonase += $detail_order->quantity * $detail_order->item->weight;

                    }

                }

                $data = (object)[
                    'status'            => 200,
                    'supplier'          => $supplier,
                    'grandTotal'        => $grandTotal,
                    'grandTotalTonase'  => $grandTotalTonase,
                    'message'           => 'Success'
                ];

                return response()->json($data);
            } else {
                return response()->json([
                    'supplier' => $supplier,
                    'grandTotal'        => 0,
                    'grandTotalTonase'  => 0,
                ]);
            }
        } catch (\Throwable $th) {
            
            return response()->json([
                'status'            => 400,
                'message'           => $th->getMessage()                
            ]);

        }
    }

    public function exportToExcel()
    {
        $fileName = $this->getFileName($_GET['startDate'], $_GET['endDate'], $_GET['supplierId']);

        return (new PurchaseOrderReportExport)->download($fileName.'.xlsx');

    }

    public function getFileName($startDate, $endDate, $supplierId)
    {
        $supplier = Supplier::find($supplierId);
        if ($startDate && $endDate && $supplierId) {
            $fileName = 'Laporan PO ('.$startDate.' - '.$endDate.') '.$supplier->supplier_code;
        } else if ($startDate && $endDate) {
            $fileName = 'Laporan PO ('.$startDate.' - '.$endDate.') ';
        } else {
            $fileName = 'Laporan PO '.$supplier->supplier_code;
        }

        return $fileName;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PurchaseOrder $purchaseOrder)
    {
        return view('pages.purchase_order.report.show', [
            'purchase_order'    => $purchaseOrder,
            'title'             => $purchaseOrder->order_number
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
