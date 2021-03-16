@extends('app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('company') }}" class="btn btn-sm btn-info">Kembali</a>
          </div>
          <div class="card-body">
            <form action="{{ route($action, $company) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @if ($company->id)
                @method('put')
              @endif
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="companyName" placeholder="" autocomplete="off" value="{{ old('name') ?? $company->name }}" required>
                  @error('name')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                  <textarea name="address" id="companyAddress" cols="30" rows="5" class="form-control">{{ old('address') ?? $company->address }}</textarea>
                  @error('name')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Telepon</label>
                <div class="col-sm-9">
                  <input type="text" name="phone" class="form-control" id="companyPhone" placeholder="" autocomplete="off" value="{{ old('phone') ?? $company->phone }}" required>
                  @error('phone')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" name="email" class="form-control" id="companyEmail" placeholder="" autocomplete="off" value="{{ old('email') ?? $company->email }}" required>
                  @error('email')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Fax</label>
                <div class="col-sm-9">
                  <input type="text" name="fax" class="form-control" id="companyFax" placeholder="" autocomplete="off" value="{{ old('fax') ?? $company->fax }}" required>
                  @error('fax')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Penanggung Jawab</label>
                <div class="col-sm-9">
                  <input type="text" name="person_in_charge" class="form-control" id="companyPic" placeholder="" autocomplete="off" value="{{ old('person_in_charge') ?? $company->person_in_charge }}" required>
                  @error('phone')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Logo</label>
                <div class="col-sm-9">
                  <input type="file" name="logo" class="form-control-file" id="companyLogo" placeholder="" autocomplete="off" {{ $company->id ? '' : 'required' }}>
                  @if ($company->id)
                    <input type="hidden" name="oldLogo" id="hiddenCompanyLogo" value="{{ $company->logo }}" class="form-control">
                  @endif
                  @error('logo')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Cap</label>
                <div class="col-sm-9">
                  <input type="file" name="stamp" class="form-control-file" id="companyStamp" placeholder="" autocomplete="off" {{ $company->id ? '' : 'required' }}>
                  @if ($company->id)
                    <input type="hidden" name="oldStamp" id="hiddenCompanyStamp" value="{{ $company->stamp }}" class="form-control">                    
                    <span class="text-danger">* Tidak perlu input gambar jika tidak ingin mengubah Logo / Cap</span>
                  @endif
                  @error('stamp')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="float-right">
                <button class="btn btn-primary"><i class="ti-save"></i> &nbsp;{{ $submitButton }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    
  </script>
@endpush