<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Illuminate\Http\Request;

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
            $orders = $this->getPurchaseOrder(request()->get('supplierId'));
            return datatables()->of($orders)
                ->addColumn('action', function($data){
                    $button = '<a href="" class="btn btn-sm btn-primary mr-1"><i class="fa fa-search"></i></a>';

                    return $button;
                })
                ->addColumn('order_date', function($data){
                    return simpleDate($data->order_date);
                })
                ->addColumn('status', function($data){
                    return order_status($data->status);
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

    public function getPurchaseOrder($supplierId)
    {
        if ($supplierId) {
            $orders = PurchaseOrder::where('supplier_id', $supplierId)->get();            
        } else {
            $orders = null;
        }

        return $orders;
    }

    public function getReports()
    {
        $supplier = Supplier::find(request('supplierId'));
        $orders = PurchaseOrder::where('supplier_id', $supplier->id)->get();

        try {
            if ($supplier && $orders) {

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
            }
        } catch (\Throwable $th) {
            
            return response()->json([
                'status'            => 400,
                'message'           => $th->getMessage()                
            ]);

        }
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
    public function show($id)
    {
        //
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
