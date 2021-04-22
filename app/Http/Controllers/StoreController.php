<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    /**
     * Get named route
     *
     */
    private function getRoute() {
        return 'store';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $store = Store::latest()->get();
            return datatables()->of($store)
                        ->addColumn('action', function($data){
                            $button = '<a href="'.route('store.edit', $data).'" class="btn btn-sm btn-info mr-1"><i class="fa fa-cog"></i></a>';
                            $button .= '<a href="#" class="btn btn-sm btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';

                            return $button;
                        })
                        ->addIndexColumn()
                        ->make(true);
        }
        return view('pages.store.index', [
            'title' => 'Daftar Cabang'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.store.form', [
            'store'         => new Store,
            'title'         => 'Tambah Cabang',
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
    public function store(StoreRequest $request)
    {
        $newStore = $request->all();
        try {
            $store = Store::create($newStore);
            if ($store) {
                return redirect()->route($this->getRoute())->with('success', 'Cabang berhasil ditambah.');
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
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('pages.store.form', [
            'store'         => $store,
            'title'         => 'Edit Cabang',
            'submitButton'  => 'Simpan',
            'action'        => $this->getRoute().'.edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Store $store)
    {
        $newStore = $request->all();
        try {
            $store->update($newStore);
            
            return redirect()->route($this->getRoute())->with('success', 'Simpan data berhasil.');
        } catch (\Throwable $th) {
            return redirect()->route($this->getRoute())->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $store = Store::findOrFail($request->id);
        $store->delete();
    }

    public function getStores(Request $request)
    {        
        if($request->has('q')){
            $search = $request->q;
        }else{
            $search = '';
        }

        $data = Store::where('name', 'like', '%'.$search.'%')->get();
        
        return response()->json($data);
    }
}
