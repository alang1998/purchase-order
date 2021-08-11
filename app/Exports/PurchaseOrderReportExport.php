<?php

namespace App\Exports;

use App\Models\Supplier;
use App\Models\PurchaseOrder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class PurchaseOrderReportExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        $startDate = $_GET['startDate'];
        $endDate = $_GET['endDate'];
        $supplierId = $_GET['supplierId'];

        $supplier = Supplier::find($supplierId);
        if ($startDate && $endDate && $supplierId) {
            $orders = PurchaseOrder::where('supplier_id', $supplierId)->whereBetween('order_date', [$startDate, $endDate])->where('status', '1')->get();
        } else if ($startDate && $endDate) {
            $orders = PurchaseOrder::whereBetween('order_date', [$startDate, $endDate])->where('status', '1')->get();
        } else {
            $orders = PurchaseOrder::where('supplier_id', $supplierId)->where('status', '1')->get();
        }

        return view('pages.purchase_order.report.export', [
            'supplier'  => $supplier,
            'orders'    => $orders,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);
    }
}
