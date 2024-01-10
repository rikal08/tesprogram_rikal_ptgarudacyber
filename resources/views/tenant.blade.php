@extends('layouts.app')

@section('title', 'Customer')

@section('content')
    <!-- Main content here -->
    <h1 class="mb-4">Daftar Tenant</h1>

    <a href="{{ url('tenants/create') }}" class="btn btn-primary">Register</a>
    <br><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Phone</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($tenants as $tenants)
                <tr>
                    <td>{{ $tenants->id }}</td>
                    <td>{{ $tenants->tenant_name }}</td>
                    <td>{{ $tenants->tenant_phone }}</td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection