@extends('layouts.app')

@section('content')
    <div class="container">
        <a href=" {{ route('/employees/create')  }} " class="btn btn-success"><i class="fas fa-plus"></i> Create new employee</a><br><br>
        @if(Session::has('success'))
            <span class="text-success"> {{ Session::get('success') }} </span>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Company</th>
                <th scope="col">E-mail</th>
                <th scope="col">Phone</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->company->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td class="size-td-action">
                        <a class="btn btn-outline-primary padding-action-icons" href=" {{ route('/employees/edit', [$employee->id_employee]) }} ">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-outline-danger padding-action-icons" onclick="handleDelete( {{ $employee->id_employee }} )">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $employees->withQueryString()->links()}}
    </div>
    <script>
        function handleDelete (id) {
            if(!confirm('Are you sure you want to delete?')) return false;
            axios.defaults.headers.common = {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            };
            axios.post('/employees/destroy/' + id)
            .finally(function () {
                location.reload();
            })
            .catch(function(error) {
                console.log(error);
            });
        }
    </script>
@endsection
