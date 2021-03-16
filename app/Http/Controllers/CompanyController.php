<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Get named route
     *
     */
    private function getRoute() {
        return 'company';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.company.index', [
            'title' => 'Perusahaan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.company.form', [
            'company'           => new Company,
            'title'             => 'Tambah Perusahaan',
            'submitButton'        => 'Tambah',
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
            $company = Company::create([
                'name'              => $request->name,
                'address'           => $request->address,
                'phone'             => $request->phone,
                'fax'               => $request->fax,
                'email'             => $request->email,
                'person_in_charge'  => $request->person_in_charge,
                'logo'              => $this->uploadLogo($request->logo),
                'stamp'             => $this->uploadCap($request->stamp)
            ]);
            if ($company) {
                return redirect()->route($this->getRoute())->with('success', 'Perusahaan berhasil ditambah.');
            } else {
                return redirect()->route($this->getRoute())->with('error', 'Terjadi kesalahan');
            }
        } catch (\Throwable $th) {
            return redirect()->route($this->getRoute())->with('error', $th->getMessage());
        }
    }    

    public function uploadLogo($logo){
        $filename = time().'-'.Str::random(10).'.'.$logo->getClientOriginalExtension();
        $logo->move(public_path('upload/logo'), $filename);

        return $filename;
    }

    public function uploadCap($cap){
        $filename = time().'-'.Str::random(10).'.'.$cap->getClientOriginalExtension();
        $cap->move(public_path('upload/cap'), $filename);

        return $filename;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
