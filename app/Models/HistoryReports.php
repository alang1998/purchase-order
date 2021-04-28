<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryReports extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(PurchaseOrder::class, 'order_id');
    }

    public function goods_receipt()
    {
        return $this->hasMany(GoodsReceipt::class, 'history_report_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
