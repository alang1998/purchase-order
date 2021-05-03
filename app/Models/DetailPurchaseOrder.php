<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPurchaseOrder extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function orders()
    {
        return $this->belongsTo(PurchaseOrder::class, 'order_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function receipt_history()
    {
        return $this->hasMany(GoodsReceipt::class, 'detail_order_id');
    }
}
