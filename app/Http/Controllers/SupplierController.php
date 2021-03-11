<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Get named route
     *
     */
    private function getRoute() {
        return 'supplier';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $supplier = Supplier::latest()->get();
            return datatables()->of($supplier)
                        ->addColumn('action', function($data){
                            $button = '<a href="'.route('supplier.edit', $data).'" class="btn btn-sm btn-info mr-1"><i class="fa fa-cog"></i></a>';
                            $button .= '<a href="" class="btn btn-sm btn-primary mr-1"><i class="fa fa-search"></i></a>';
                            $button .= '<a href="#" class="btn btn-sm btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';

                            return $button;
                        })              
                        ->addColumn('region', function($data){
                            return $data->region->name;
                        })          
                        ->addIndexColumn()
                        ->make(true);
        }
        return view('pages.supplier.index', [
            'title' => 'Daftar Supplier'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.supplier.form', [
            'supplier'          => new Supplier,
            'title'             => 'Tambah Supplier',
            'submitButton'      => 'Tambah',
            'action'            => $this->getRoute().'.create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $supplier = Supplier::create([
                'supplier_code'     => $request->supplier_code,
                'name'              => $request->name,
                'address'           => $request->address,
                'phone'             => $request->phone,
                'email'             => $request->email,
                'person_in_charge'  => $request->person_in_charge,
                'region_id'         => $request->region
            ]);
            
            if ($supplier) {
                return redirect()->route($this->getRoute())->with('success', 'Supplier berhasil ditambah.');
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
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('pages.supplier.form', [
            'supplier'          => $supplier,
            'regions'           => Region::get(),
            'title'             => 'Edit Supplier',
            'submitButton'      => 'Simpan',
            'action'            => $this->getRoute().'.edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        try {

            $supplier->update([
                'supplier_code'         => $request->supplier_code,
                'name'                  => $request->name,
                'address'               => $request->address,
                'phone'                 => $request->phone,
                'email'                 => $request->email,
                'person_in_charge'      => $request->person_in_charge,
                'region_id'             => $request->region
            ]);

            return redirect()->route($this->getRoute())->with('success', 'Simpan data berhasil.');
            
        } catch (\Throwable $th) {
            
            return redirect()->route($this->getRoute())->with('error', $th->getMessage());
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $supplier = Supplier::findOrFail($request->id);
        $supplier->delete();
    }
}
