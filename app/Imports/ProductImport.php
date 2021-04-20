<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\Item;
use App\Models\Unit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $merk = Brand::where('brand_code', $row['merk'])->first();
        $unit = Unit::where('name', $row['unit'])->first();
        $item = Item::where('item_code', $row['item_code'])->first();

        if ($merk && $unit) {
            if ($item) {
                $item->update([
                    'item_code' => $row['item_code'],
                    'name'      => $row['name'],
                    'weight'    => $row['weight'],
                    'unit_id'   => $unit->id,
                    'brand_id'  => $merk->id
                ]);
            } else {
                $newItem = new Item([
                    'item_code' => $row['item_code'],
                    'name'      => $row['name'],
                    'weight'    => $row['weight'],
                    'unit_id'   => $unit->id,
                    'brand_id'  => $merk->id
                ]);

                return $newItem;
            }
        } else {
            dd('Merk :'.$merk->brand_code.' tidak ditemukan.', 'Unit :'.$unit->name.' tidak ditemukan.');
        }
    }
}
