<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Get named route
     *
     */
    private function getRoute() {
        return 'role';
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
            $role = Role::latest()->get();
            return datatables()->of($role)
                    ->addColumn('action', function($data){
                        $button = '<a href="'.route('role.edit', $data).'" class="btn btn-sm btn-info mr-1"><i class="fa fa-cog"></i></a>';
                        $button .= '<a href="#" class="btn btn-sm btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';

                        return $button;
                    })
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('pages.role.index', [
            'title' => 'Daftar Wewenang'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.role.form', [
            'role'          => new Role,
            'action'        => $this->getRoute().'.create',
            'title'         => 'Tambah Wewenang',
            'submitButton'  => 'Tambah'
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
        $newRole = $request->all();
        $this->validator($request->all());
        
        try {
            $newRole['slug'] = Str::slug($newRole['name']);
            $role = Role::create($newRole);
            if ($role) {
                return redirect()->route($this->getRoute())->with('success', 'Wewenang berhasil ditambah.');                
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
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('pages.role.form', [
            'role'          => $role,
            'action'        => $this->getRoute().'.edit',
            'title'         => 'Edit Wewenang',
            'submitButton'  => 'Simpan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $newRole = $request->all();
        $this->validator($request->all());

        try {
            if ($role) {
                $newRole['slug'] = Str::slug($request->name);
                $role->update($newRole);

                return redirect()->route($this->getRoute())->with('success', 'Simpan data berhasil.');
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
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $role = Role::findOrFail($request->id);
        $role->delete();
    }
}
