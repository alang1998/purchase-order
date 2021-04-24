<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function detail_orders()
    {
        return $this->hasMany(DetailPurchaseOrder::class);
    }
}
