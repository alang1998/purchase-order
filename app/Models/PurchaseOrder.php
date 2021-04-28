<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function detail_orders()
    {
        return $this->hasMany(DetailPurchaseOrder::class, 'order_id');
    }

    public function verification_order()
    {
        return $this->hasOne(HistoryVerification::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function history_reports()
    {
        return $this->hasMany(HistoryReports::class, 'order_id');
    }
}
