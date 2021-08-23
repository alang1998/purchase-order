<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Store;
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
                        if ($data->role_id > 1) {
                            $button = '<a href="'.route('pengguna.active', $data).'" class="btn btn-sm mr-1 '.($data->status == 0 ? 'btn-success' : 'btn-danger').' " title="'.($data->status == 0 ? 'Active' : 'Nonactive').'"><i class="fa '.($data->status == 0 ? 'fa-check-circle' : 'fa-times-circle').'"></i></a>';
                            $button .= '<a href="'.route('pengguna.edit', $data).'" class="btn btn-sm btn-warning mr-1"><i class="fa fa-pencil"></i></a>';
                            $button .= '<a href="'.route('pengguna.resetPassword', $data).'" class="btn btn-sm btn-success mr-1" title="Reset Password"><i class="fa fa-refresh"></i></a>';
                            // $button .= '<a href="#" class="btn btn-sm btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
    
                            return $button;                            
                        }
                    })
                    ->addColumn('role', function($data){
                        return $data->role->name;
                    })
                    ->addColumn('store', function($data){
                        return $data->store->name;
                    })
                    ->addColumn('ttd', function($data){
                        $contents = asset('storage/signature/'.$data->signature);
                        if ($contents) {
                            $img = '<img src="'.$contents.'" alt="TTD-'.$data->signature.'" width="50px">';                            
                        }
                        return $img;
                    })
                    ->addColumn('status', function($data){
                        return user_status($data->status);
                    })
                    ->addIndexColumn()
                    ->rawColumns([
                        'ttd',
                        'action',
                        'role',
                        'status'
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
            'stores'        => Store::get(),
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
        $fileName = time().'-'.Str::random(10).'.'.$ttd->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('signature/', $ttd, $fileName);

        return $fileName;
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
            'stores'        => Store::get(),
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
                $exists = Storage::disk('public')->exists('signature/'.$request->oldSignature);
                if ($exists) {
                    Storage::disk('public')->delete('signature/'.$request->oldSignature);
                    $newUser['signature'] = $this->uploadTtd($request->signature);                    
                } else {
                    $newUser['signature'] = $this->uploadTtd($request->signature);                    
                }
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
        $exists = Storage::disk('public')->exists('signature/'.$user->signature);
        if ($exists) {
            Storage::disk('public')->delete('signature/'.$user->signature);
        }
        $user->delete();
    }

    public function resetPassword(User $user)
    {
        try {            

            $user->password = bcrypt('123456');
            $user->save();
            
            return redirect()->route($this->getRoute())->with('success', 'Password berhasil di Reset.');
        } catch (\Throwable $th) {
            return redirect()->route($this->getRoute())->with('danger', $th->getMessage());
        }
    }

    public function active(User $user)
    {
        try {            
            if ($user->status == 0) {
                $user->status = '1';
            } else {
                $user->status = '0';
            }
            $user->save();
            
            return redirect()->route($this->getRoute())->with($user->status == 0 ? 'error' : 'success', $user->name.' telah '.($user->status == 0 ? 'dinonaktifkan' : 'diaktifkan'));
        } catch (\Throwable $th) {
            return redirect()->route($this->getRoute())->with('danger', $th->getMessage());
        }

    }
}
