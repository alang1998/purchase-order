<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    /**
     * Get named route
     *
     */
    private function getRoute() {
        return 'brand';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $brand = Brand::orderBy('brand_code', 'asc')->get();
            return datatables()->of($brand)
                        ->addColumn('action', function($data){
                            $button = '<a href="'.route('brand.edit', $data).'" class="btn btn-sm btn-warning mr-1"><i class="fa fa-pencil"></i></a>';
                            $button .= '<a href="#" class="btn btn-sm btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';

                            return $button;
                        })                        
                        ->addIndexColumn()
                        ->make(true);
        }
        return view('pages.brand.index', [
            'title' => 'Daftar Merk',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.brand.form', [
            'brand'         => new Brand,
            'title'         => 'Tambah Merk',
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
    public function store(BrandRequest $request)
    {
        $newBrand = $request->all();
        try {
            $brand = Brand::create($newBrand);
            if ($brand) {
                return redirect()->route($this->getRoute())->with('success', 'Brand berhasil ditambah.');
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
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('pages.brand.form', [
            'brand'         => $brand,
            'title'         => 'Edit Merk',
            'submitButton'  => 'Simpan',
            'action'        => $this->getRoute().'.edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $newBrand = $request->all();
        try {
            $brand->update($newBrand);
            return redirect()->route($this->getRoute())->with('success', 'Simpan data berhasil.');
        } catch (\Throwable $th) {
            return redirect()->route($this->getRoute())->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->delete();
    }

    public function getBrand(Request $request)
    {        
        if($request->has('q')){
            $search = $request->q;
        }else{
            $search = '';
        }

        $data = Brand::where('name', 'like', '%'.$search.'%')->orWhere('brand_code', 'LIKE', '%'.$search.'%')->get();
        
        return response()->json($data);
    }
}
