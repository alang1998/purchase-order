<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\PurchaseOrder;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('pages.dashboard.dashboard', [
            'title' => 'Dashboard'
        ]);
    }

    public function myProfile(User $user)
    {
        return view('pages.dashboard.myProfile', [
            'user'  => $user,
            'title' => $user->name
        ]);
    }

    public function myProfileEdit(User $user)
    {
        return view('pages.dashboard.myProfileEdit', [
            'user'  => $user,
            'title' => $user->name,
            'submitButton' => 'Simpan'
        ]);
    }

    public function changePassword(ChangePasswordRequest $request, User $user)
    {
        try {
            $user->update([
                'password' => bcrypt($request->newPassword)
            ]);
            
            return redirect()->route('logout')->with('success', 'Ubah password berhasil.');
           
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.myProfile.edit', $user)->with('error', $th->getMessage());
        }
    }
}
