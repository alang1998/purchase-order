<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;
use App\Models\HistoryVerification;
use Illuminate\Support\Facades\Auth;

class PurchaseOrderVerificationController extends Controller
{
    /**
     * Get named route
     *
     */
    private function getRoute() {
        return 'purchase_order.verification';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $orders = PurchaseOrder::with('detail_orders')->withCount(['detail_orders as total' => function($query){
                $query->select(DB::raw('SUM(quantity * price) as total'));
            }])->where('status', '0')->get();

            return datatables()->of($orders)
                    ->addColumn('action', function($data){
                        $button = '<a href="'.route('purchase_order.verification.show', $data).'" class="btn btn-sm btn-primary mr-1"><i class="fa fa-search"></i></a>';

                        return $button;
                    })
                    ->addColumn('user', function($data){
                        return $data->user->name;
                    })
                    ->addColumn('store',  function($data){
                        return $data->store->name;
                    })
                    ->addColumn('total', function($data){
                        return 'Rp. '.number_format($data->total, '0', '', '.');
                    })
                    ->addColumn('status', function($data){
                        return order_status($data->status);
                    })
                    ->addIndexColumn()
                    ->rawColumns(['action', 'status'])
                    ->make(true);

        }
        return view('pages.purchase_order.verification.index', [
            'title' => 'Verifikasi Pembelian Barang'
        ]);
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
    public function show(PurchaseOrder $purchaseOrder)
    {   
        return view('pages.purchase_order.verification.show', [
            'purchase_order' => $purchaseOrder,
            'title'          => $purchaseOrder->order_number
        ]);        
    }

    public function verification(Request $request, PurchaseOrder $purchaseOrder)
    {
        try {

            if ($request->status) {
                $status = '1';
                $description = 'Purchase order disetujui';
            } else {
                $status = '2';
                $description = 'Purchase order ditolak';
            }

            $purchaseOrder->update([
                'status' => $status
            ]);

            $history = HistoryVerification::create([
                'order_id' => $purchaseOrder->id,
                'user_id'  => Auth::user()->id,
                'status'   => $status == 1 ? '1' : '0',
                'description' => $description
            ]);
            
            return redirect()->route($this->getRoute().'.show', $purchaseOrder)->with(($request->status) ? 'success' : 'error', ($request->status) ? $purchaseOrder->order_number.' telah disetujui.' : $purchaseOrder->order_number.' telah ditolak.');

        } catch (\Throwable $th) {
            
            return redirect()->route($this->getRoute().'.show', $purchaseOrder)->with('error', $th->getMessage());

        }
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
