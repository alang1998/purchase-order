<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Get named route
     *
     */
    private function getRoute() {
        return 'pengguna';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $user = User::latest()->get();
            return datatables()->of($user)
                    ->addColumn('action', function($data){
                        $button = '<a href="'.route('pengguna.edit', $data).'" class="btn btn-sm btn-info mr-1"><i class="fa fa-cog"></i></a>';
                        $button .= '<a href="" class="btn btn-sm btn-primary mr-1"><i class="fa fa-search"></i></a>';
                        $button .= '<a href="#" class="btn btn-sm btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';

                        return $button;
                    })
                    ->addColumn('role', function($data){
                        return $data->role->name;
                    })
                    ->addColumn('ttd', function($data){
                        $url = asset('upload/ttd/'.$data->signature);
                        $img = '<img src="'.$url.'" alt="TTD-'.$data->signature.'" width="50px">';

                        return $img;
                    })
                    ->addIndexColumn()
                    ->rawColumns([
                        'ttd',
                        'action',
                        'role'
                    ])
                    ->make(true);
        }
        return view('pages.user.index', [
            'title' => 'Daftar Pengguna'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.form', [
            'user'          => new User,
            'roles'         => Role::latest()->get(),
            'title'         => 'Tambah Pengguna',
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
    public function store(UserRequest $request)
    {
        $newUser = $request->all();
        try {
            $newUser['password'] = bcrypt('123456');
            $newUser['signature'] = $this->uploadTtd($request->signature);
            $newUser['status'] = '1';
    
            $user = User::create($newUser);
    
            if ($user) {
                return redirect()->route($this->getRoute())->with('success', 'User berhasil ditambahkan');
            } else {
                return redirect()->route($this->getRoute())->with('error', 'Terjadi kesalahan');
            }
        } catch (\Throwable $th) {
            return redirect()->route($this->getRoute())->with('error', $th->getMessage());
        }
    }

    public function uploadTtd($ttd){
        $filename = time().'-'.Str::random(10).'.'.$ttd->getClientOriginalExtension();
        Storage::disk('local')->put('img/user-signature/'.$filename, $filename);
        // $ttd->move(public_path('upload/ttd'), $filename);

        return $filename;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {        
        return view('pages.user.form', [
            'user'          => $user,
            'roles'         => Role::latest()->get(),
            'title'         => 'Edit Pengguna',
            'submitButton'  => 'Simpan',
            'action'        => $this->getRoute().'.edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $newUser = $request->all();
        try {
            if ($request->hasFile('signature')) {
                unlink(public_path('upload/ttd/'.$request->oldSignature));
                $newUser['signature'] = $this->uploadTtd($request->signature);
            } else {
                $newUser['signature'] = $request->oldSignature;
            }
            $user->update($newUser);

            return redirect()->route($this->getRoute())->with('success', 'Simpan data berhasil');

        } catch (\Throwable $th) {
            return redirect()->route($this->getRoute())->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
    }
}
