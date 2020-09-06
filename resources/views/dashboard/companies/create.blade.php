@extends('layouts.app')

@section('content')
    <div class="container">
        <a href=" {{ route('companies')  }} " class="btn btn-success"><i class="fas fa-undo-alt"></i> Return to table</a>
        <br/>
        <br/>
        <h3>Creating new company</h3>
        <br/>
        <form method="post" action="{{ route('/companies/store')  }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">*Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="*Company name..." required>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">*E-mail</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="email@example.com" required>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
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
                </div>
            </div>
            <div class="form-group row">
                <label for="inputWebsite" class="col-sm-2 col-form-label">Website</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputWebsite" name="website" placeholder="Company website...">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    <script>
        $(function() {
            $('#navcompanies').addClass('active');
        });
    </script>
@endsection
