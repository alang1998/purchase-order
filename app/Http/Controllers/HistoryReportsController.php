<?php

namespace App\Http\Controllers;

use App\Models\GoodsReceipt;
use Illuminate\Http\Request;
use App\Models\HistoryReports;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Auth;

class HistoryReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function receiptGoods(Request $request, PurchaseOrder $purchaseOrder)
    {
        try {

            if ($this->sumQuantityReceipt($request->quantityReceipt) > 0) {
                $historyReports = HistoryReports::create([
                    'order_id'  => $purchaseOrder->id,
                    'user_id'   => Auth::user()->id,
                    'description' => '-'
                ]);
            }

            if ($historyReports) {
                
                for ($i=0; $i < count($request->detail_id); $i++) { 
                    if ($request->quantityReceipt[$i] && $request->quantityReceipt[$i] > 0) {
                        GoodsReceipt::create([
                            'history_report_id' => $historyReports->id,
                            'detail_order_id'   => $request->detail_id[$i],
                            'quantity'          => $request->quantityReceipt[$i]
                        ]);
                    }
                }

                return redirect()->route('purchase_order.report.show', $purchaseOrder)->with('success', 'Barang berhasil diterima.');

            } else {

                return redirect()->route('purchase_order.report.show', $purchaseOrder)->with('danger', 'Terjadi kesalahan.');

            }

            
        } catch (\Throwable $th) {
            
            return redirect()->route('purchase_order.report.show', $purchaseOrder)->with('danger', $th->getMessage());

        }
    }

    public function sumQuantityReceipt($quantity)
    {
        $totalQuantity = 0;
        foreach ($quantity as $q) {
            $totalQuantity += $q;
        }

        return $totalQuantity;
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
     * @param  \App\Models\HistoryReports  $historyReports
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryReports $historyReports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryReports  $historyReports
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryReports $historyReports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoryReports  $historyReports
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryReports $historyReports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryReports  $historyReports
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryReports $historyReports)
    {
        //
    }
}
