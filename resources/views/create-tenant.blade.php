@extends('layouts.app')

@section('title', 'Registrasi Pelanggan')


@section('content')
    <!-- Main content here -->
    <h1 class="mb-4">Registrasi Tenant</h1>
    @if(session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
    <form action="{{ url('tenants') }}" method="post">
        @method('POST')
        @csrf
        <!-- Form registrasi akan ditambahkan di sini -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
      
        
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection
