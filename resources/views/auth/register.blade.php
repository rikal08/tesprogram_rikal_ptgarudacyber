@extends('layouts.app')

@section('title', 'Registrasi Pelanggan')


@section('content')
    <!-- Main content here -->
    <h1 class="mb-4">Registrasi Pelanggan</h1>
    <form action="{{ url('customers') }}" method="post">
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
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection
