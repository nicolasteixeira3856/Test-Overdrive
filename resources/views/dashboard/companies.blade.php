@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->created_at }}</td>
                        <td class="size-td-action">
                            <i class="fas fa-edit padding-action-icons"></i>
                            <i class="fas fa-trash padding-action-icons"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $companies->withQueryString()->links()}}
    </div>
@endsection
