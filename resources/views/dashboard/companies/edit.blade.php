@extends('layouts.app')

@section('content')
    <div class="container">
        <a href=" {{ route('companies')  }} " class="btn btn-success"><i class="fas fa-undo-alt"></i> Return to table</a>
        <br/>
        <br/>
        <h3>Editing company {{ $company->name }}</h3>
        <br/>
        <form method="post" action="{{ route('/companies/update', [$company->id_company])  }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">*Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="*Company name..." required value=" {{ $company->name }} ">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">*E-mail</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="email@example.com" required value=" {{ $company->email }} ">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="logo">Current logo (if any)</label>
                <div class="col-sm-10">
                    @if ($company->logo !== null)
                        <img class="logo-size-edit" src="{{asset("storage/{$company->logo}")}}" alt="Could not find the logo of this company"/><br/>
                    @else
                        <h5 class="text-info" style="margin-top: 10px;">This company does not have a logo</h5>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="logo">Logo</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="logo" name="logo" accept="image/x-png,image/jpeg">
                    @if ($errors->has('logo'))
                        <span class="text-danger">{{ $errors->first('logo') }}</span>
                    @endif
                    <br/>
                    <h4 class="text-danger">Tip: If you don't want to change the logo, keep the file input empty.</h4>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputWebsite" class="col-sm-2 col-form-label">Website</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputWebsite" name="website" placeholder="Company website..." value="{{ $company->website }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script>
        $(function() {
            $('#navcompanies').addClass('active');
        });
    </script>
@endsection
