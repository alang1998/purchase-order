<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsReceipt extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function history_report()
    {
        return $this->belongsTo(HistoryReports::class, 'history_report_id');
    }

    public function detail_order()
    {
        return $this->belongsTo(DetailPurchaseOrder::class, 'detail_order_id');
    }
}
