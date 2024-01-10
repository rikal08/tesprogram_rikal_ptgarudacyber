<!-- resources/views/create_transaction.blade.php -->
@extends('layouts.app')

@section('title', 'Buat Transaksi')

@section('content')
    <div class="container mt-5">
        <h1>Buat Transaksi</h1>
        @if(session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ url('transactions') }}" method="post">
            @method('POST')
            @csrf
            

            <!-- Bagian untuk mencari pelanggan -->
            <div id="search_customer" class="mb-3">
                <label for="customer_search" class="form-label">Cari Pelanggan:</label>
                <input type="text" id="customer_search" class="form-control" placeholder="Masukkan Nama Pelanggan">
                <!-- Daftar pelanggan akan ditampilkan di sini -->
            </div>

            <!-- Elemen dropdown yang diperbarui -->
            <div class="mb-3">
                <label for="customers_dropdown" class="form-label">Pilih Pelanggan:</label>
                <select id="customers_dropdown" name="customer_id" class="form-select"></select>
            </div>

            <div class="mb-3">
                <label class="form-label">Pilih Tenants:</label>
                <select  name="tenant_id" class="form-select">
                    @foreach ($tenants as $item)
                        <option value="{{ $item->id }}">{{ $item->tenant_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Jumlah Pembelanjaan (IDR)</label>
                <input type="number" class="form-control" id="amount" name="amount" required>
            </div>
            <button type="submit" class="btn btn-primary">Buat Transaksi</button>
        </form>
    </div>

   
@endsection
