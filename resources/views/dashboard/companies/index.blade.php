@extends('layouts.app')

@section('content')
    <div class="container">
        <a href=" {{ route('/companies/create')  }} " class="btn btn-success"><i class="fas fa-plus"></i> Create new company</a><br><br>
        @if(Session::has('success'))
            <span class="text-success"> {{ Session::get('success') }} </span>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Website</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website ?? 'This company does not have a website' }}</td>
                        <td class="size-td-action">
                            <a class="btn btn-outline-primary padding-action-icons" href=" {{ route('/companies/edit', [$company->id_company]) }} ">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-outline-danger padding-action-icons" onclick="handleDelete( {{ $company->id_company }} )">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $companies->withQueryString()->links()}}
    </div>
    <script>
        function handleDelete (id) {
            if(!confirm('Are you sure you want to delete?')) return false;
            axios.defaults.headers.common = {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            };
            axios.post('/companies/destroy/' + id)
            .finally(function () {
                location.reload();
            })
            .catch(function(error) {
                console.log(error);
            });
        }
    </script>
    <script>
        $(function() {
            $('#navcompanies').addClass('active');
        });
    </script>
@endsection
