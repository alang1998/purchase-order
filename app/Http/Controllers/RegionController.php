<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Requests\RegionRequest;

class RegionController extends Controller
{
    /**
     * Get named route
     *
     */
    private function getRoute() {
        return 'region';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $region = Region::latest()->get();
            return datatables()->of($region)
                    ->addColumn('action', function($data){
                        $button = '<a href="'.route('region.edit', $data).'" class="btn btn-sm btn-info mr-1"><i class="fa fa-cog"></i></a>';
                        $button .= '<a href="#" class="btn btn-sm btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';

                        return $button;
                    })
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('pages.region.index', [
            'title'     => 'Daftar Wilayah'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.region.form', [
            'region'        => new Region,
            'title'         => 'Tambah Wilayah',
            'submitButton'  => 'Tambah',
            'action'        => $this->getRoute() . '.create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionRequest $request)
    {
        $newRegion = $request->all();

        try {
            $region = Region::create($newRegion);
            if ($region) {
                return redirect()->route($this->getRoute())->with('success', 'Wilayah berhasil ditambah.');
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
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        return view('pages.region.form', [
            'region'        => $region,
            'title'         => 'Edit Wilayah',
            'submitButton'  => 'Simpan',
            'action'        => $this->getRoute() . '.edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(RegionRequest $request, Region $region)
    {
        $newRegion = $request->all();
        try {
            $region->update($newRegion);

            return redirect()->route($this->getRoute())->with('success', 'Simpan data berhasil.');
        } catch (\Throwable $th) {
            return redirect()->route($this->getRoute())->with('danger', $th->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $region = Region::find($request->id);
        $region->delete();
    }

    public function getRegion(Request $request)
    {        
        if($request->has('q')){
            $search = $request->q;
        }else{
            $search = '';
        }

        $data = Region::where('name', 'like', '%'.$search.'%')->get();
        
        return response()->json($data);
    }
}
