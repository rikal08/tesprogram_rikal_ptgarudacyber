@extends('layouts.app')

@section('title', 'Customer')

@section('content')
    <!-- Main content here -->
    <h1 class="mb-4">Daftar Pelanggan</h1>
    @if(session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif

    <a href="{{ url('customers/create') }}" class="btn btn-primary">Register</a>
    <br><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->customer_name }}</td>
                    <td>{{ $customer->customer_phone }}</td>
                    <td>{{ $customer->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection