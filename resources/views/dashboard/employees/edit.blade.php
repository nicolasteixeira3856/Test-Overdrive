@extends('layouts.app')

@section('content')
    <div class="container">
        <a href=" {{ route('employees')  }} " class="btn btn-success"><i class="fas fa-undo-alt"></i> Return to table</a>
        <br/>
        <br/>
        <h3>Creating new employee</h3>
        <br/>
        <form method="post" action="{{ route('/employees/update', [$employee->id_employee])  }}">
            @csrf
            <div class="form-group row">
                <label for="inputFirstName" class="col-sm-2 col-form-label">*First name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputFirstName" name="firstname" placeholder="*First name..." required value="{{$employee->first_name}}">
                    @if ($errors->has('firstname'))
                        <span class="text-danger">{{ $errors->first('firstname') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="inputLastName" class="col-sm-2 col-form-label">*Last name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputLastName" name="lastname" placeholder="*Last name..." required value="{{$employee->last_name}}">
                    @if ($errors->has('lastname'))
                        <span class="text-danger">{{ $errors->first('lastname') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="selectCompany" class="col-sm-2 col-form-label">*Company</label>
                <div class="col-sm-10">
                    <select name="company" id="selectCompany" class="form-control" required>
                        <option value="0">*Select company</option>
                        @foreach ($companies as $company)
                            @if ($company->id_company === $employee->idfk_company)
                                <option value="{{$company->id_company}}" selected>{{$company->name}}</option>
                            @else
                                <option value="{{$company->id_company}}">{{$company->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @if ($errors->has('company'))
                        <span class="text-danger">{{ $errors->first('company') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">*E-mail</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="email@example.com" required value="{{$employee->email}}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPhone" class="col-sm-2 col-form-label">*Phone</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="inputPhone" name="phone" placeholder="*Phone..." required value="{{$employee->phone}}">
                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script>
        $(function() {
            $('#navemployees').addClass('active');
        });
    </script>
@endsection
