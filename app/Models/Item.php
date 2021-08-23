<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class)->withPivot('price');
    }

    public function detail_orders()
    {
        return $this->hasMany(DetailPurchaseOrder::class, 'item_id');
    }
}
