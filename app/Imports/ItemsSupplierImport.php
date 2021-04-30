<?php

namespace App\Imports;

use App\Models\Item;
use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ItemsSupplierImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $supplier = Supplier::where('supplier_code', $row['supplier_code'])->first();
        $item = Item::where('item_code', $row['item_code'])->first();

        if ($supplier && $item) {
            $dataSync = [];

            $dataSync[$item->id] = ['price' => $row['price']];
            
            $supplier->items()->sync($dataSync, false);
        } else {
            dd('Supplier: '.$row['supplier_code'].($supplier ? ' ditemukan' : ' tidak ditemukan.'), 'Item: '.$row['item_code'].($item ? ' ditemukan' : ' tidak ditemukan.'));
        }
        
    }
}
