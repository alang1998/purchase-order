<?php

namespace App\Http\Controllers;

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

    public function receiptGoods(PurchaseOrder $purchaseOrder)
    {
        $newHistory = request()->all();
        try {
            for ($i=0; $i < count(request('item_id')); $i++) { 
                HistoryReports::create([
                    'detail_order_id' => request('detail_id')[$i],
                    'user_id'         => Auth::user()->id,
                    'quantity'        => request('quantity')[$i],
                    'status'          => '0',
                ]);
            }

            return redirect()->route('pages.purchase_order.report.show', $purchaseOrder)->with('success', 'Barang berhasil diterima.');

        } catch (\Throwable $th) {
            
            return redirect()->route('')->with('success', $th->getMessage());

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
