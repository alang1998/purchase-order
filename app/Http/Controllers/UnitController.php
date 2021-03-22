<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Get named route
     *
     */
    private function getRoute() {
        return 'unit';
    }

    

    public function validator($data)
    {
        $formValidate = request()->validate([
            'name' => 'required'
        ], $data);

        return $formValidate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $unit = Unit::get();
            return datatables()->of($unit)
                    ->addColumn('action', function($data){
                        $button = '<a href="'.route('unit.edit', $data).'" class="btn btn-sm btn-info mr-1"><i class="fa fa-cog"></i></a>';
                        $button .= '<a href="#" class="btn btn-sm btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';

                        return $button;
                    })
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('pages.unit.index',[
            'title' => 'Daftar Unit'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.unit.form', [
            'unit'         => new Unit,
            'title'        => 'Tambah Unit',
            'submitButton' => 'Tambah',
            'action'       => $this->getRoute().'.create'
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
        $newUnit = $request->all();
        $this->validator($newUnit);

        try {
            $unit = Unit::create($newUnit);
            if ($unit) {
                return redirect()->route($this->getRoute())->with('success', 'Unit berhasil ditambah.');
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
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('pages.unit.form', [
            'unit'         => $unit,
            'title'        => 'Edit Unit',
            'submitButton' => 'Simpan',
            'action'       => $this->getRoute().'.edit'
        ]);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $newUnit = $request->all();
        $this->validator($newUnit);

        try {
            $unit->update($newUnit);

            return redirect()->route($this->getRoute())->with('success', 'Simpan data berhasil.');
        } catch (\Throwable $th) {
            return redirect()->route($this->getRoute())->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $unit = Unit::findOrFail($request->id);
        $unit->delete();
    }

    public function getUnit(Request $request)
    {        
        if($request->has('q')){
            $search = $request->q;
        }else{
            $search = '';
        }

        $data = Unit::where('name', 'like', '%'.$search.'%')->get();
        
        return response()->json($data);
    }
}
