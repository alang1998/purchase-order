<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Unit;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use App\Http\Requests\ItemRequest;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller
{
    /**
     * Get named route
     *
     */
    private function getRoute() {
        return 'item';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $item = Item::orderBy('item_code', 'asc')->get();
            return datatables()->of($item)
                    ->addColumn('action', function($data){
                        $button = '<a href="'.route('item.show', $data).'" class="btn btn-sm btn-primary mr-1" target="_BLANK"><i class="fa fa-search"></i></a>';
                        $button .= '<a href="'.route('item.edit', $data).'" class="btn btn-sm btn-warning mr-1"><i class="fa fa-pencil"></i></a>';
                        $button .= '<a href="#" class="btn btn-sm btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';

                        return $button;
                    })
                    ->addColumn('brand', function($data){
                        $brand = $data->brand->name;

                        return $brand;
                    })
                    ->addColumn('unit', function($data){
                        $unit = $data->unit->name;

                        return $unit;
                    })
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('pages.item.index', [
            'title' => 'Daftar Produk'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.item.form', [
            'item'          => new Item,
            'brands'        => Brand::get(),
            'units'         => Unit::get(),
            'title'         => 'Tambah Produk',
            'submitButton'  => 'Tambah',
            'action'        => $this->getRoute().'.create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $newItem = $request->all();
        try {
            $item = Item::create($newItem);
            if ($item) {
                return redirect()->route($this->getRoute())->with('success', 'Produk berhasil ditambah.');
            } else {
                return redirect()->route($this->getRoute())->with('error', 'Terjadi kesalahan.');
            }
        } catch (\Throwable $th) {
            return redirect()->route($this->getRoute())->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('pages.item.show', [
            'item' => $item,
            'title' => $item->item_code.' '.$item->name,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('pages.item.form', [
            'item'          => $item,
            'brands'        => Brand::get(),
            'units'         => Unit::get(),
            'title'         => 'Edit Produk',
            'submitButton'  => 'Simpan',
            'action'        => $this->getRoute().'.edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, Item $item)
    {
        $newItem = $request->all();
        try {
            $item = $item->update($newItem);            
            if ($item) {
                return redirect()->route($this->getRoute())->with('success', 'Produk berhasil ditambah.');
            } else {
                return redirect()->route($this->getRoute())->with('error', 'Terjadi kesalahan.');
            }
        } catch (\Throwable $th) {            
            return redirect()->route($this->getRoute())->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $item = Item::findOrFail($request->id);
        $item->delete();
    }

    public function importItems(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xlsx,xls'
        ]);

        $file = $request->file('file');
        $fileName = date('Y-m-d').'-items.'.$file->getClientOriginalExtension();
        $file->move(public_path('import/items'), $fileName);

        Excel::import(new ProductImport, public_path('/import/items/'.$fileName));

        return redirect()->route($this->getRoute())->with('success', 'Import data berhasil.');
    }

    public function getItems(Request $request)
    {
        $keywords = trim($request->a);
        if (empty($keywords)) {
            return response()->json([]);
        }

        $datas = Item::where('name', 'like', '%'.$keywords.'%')->orWhere('item_code', 'LIKE', '%'.$keywords.'%')->get();

        $formatted_users = [];

        foreach ($datas as $data) {
            $formatted_users[] = ['id' => $data->id, 'text' => ' ['.$data->item_code.'] '.$data->name];
        }

        return response()->json($formatted_users);
    }

}
