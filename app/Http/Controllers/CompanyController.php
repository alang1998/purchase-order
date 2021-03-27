<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        if (request()->ajax()) {
            $company = Company::get();
            return datatables()->of($company)
                    ->addColumn('action', function($data){
                        $button = '<a href="'.route('company.edit', $data).'" class="btn btn-sm btn-info mr-1"><i class="fa fa-cog"></i></a>';
                        $button .= '<a href="" class="btn btn-sm btn-primary mr-1"><i class="fa fa-search"></i></a>';
                        $button .= '<a href="#" class="btn btn-sm btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';

                        return $button;                        
                    })
                    ->addIndexColumn()
                    ->make(true);
        }
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
                'stamp'             => $this->uploadStamp($request->stamp)
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
        Storage::disk('public')->putFileAs('company/logo/', $logo, $filename);

        return $filename;
    }

    public function uploadStamp($cap){
        $filename = time().'-'.Str::random(10).'.'.$cap->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('company/stamp/', $cap, $filename);

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
        return view('pages.company.form', [
            'company'           => $company,
            'title'             => 'Edit Perusahaan',
            'submitButton'      => 'Simpan',
            'action'            => $this->getRoute().'.edit'
        ]);
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
        $logo = $request->oldLogo;
        $stamp = $request->oldStamp;
        try {

            if ($request->hasFile('logo')) {
                $exists = Storage::disk('public')->exists('company/logo/'.$request->oldLogo);
                if ($exists) {
                    Storage::disk('public')->delete('company/logo/'.$request->oldLogo);
                    $logo = $this->uploadLogo($request->logo);                    
                } else {
                    $logo = $this->uploadLogo($request->logo);                    
                }
            }
            if ($request->hasFile('stamp')) {
                $exists = Storage::disk('public')->exists('company/logo/'.$request->oldStamp);
                if ($exists) {
                    Storage::disk('public')->delete('company/logo/'.$request->oldStamp);
                    $stamp = $this->uploadStamp($request->stamp);                    
                } else {
                    $stamp = $this->uploadStamp($request->stamp);                    
                }
            }
    
            $company->update([
                'name'              => $request->name,
                'address'           => $request->address,
                'phone'             => $request->phone,
                'fax'               => $request->fax,
                'email'             => $request->email,
                'person_in_charge'  => $request->person_in_charge,
                'logo'              => $logo,
                'stamp'             => $stamp
            ]);

            return redirect()->route($this->getRoute())->with('success', 'Perusahaan berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route($this->getRoute())->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $company = Company::findOrFail($request->id);
        if (Storage::disk('public')->exists('company/logo/'.$company->logo)) {
            Storage::disk('public')->delete('company/logo/'.$company->logo);
        }
        if (Storage::disk('public')->exists('company/stamp/'.$company->stamp)) {
            Storage::disk('public')->delete('company/stamp/'.$company->stamp);
        }
        $company->delete();
    }
}
