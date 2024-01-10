<!-- resources/views/transactions.blade.php -->
@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
    <div class="container mt-5">
        <h1>Daftar Transaksi Pelanggan</h1>

        <a href="{{ url('/transactions/create') }}" class="btn btn-primary">Input Transaksi</a>
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Transaksi ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Tenant</th>
                    <th>Jumlah Pembelanjaan (IDR)</th>
                    <th>Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->transaction_id }}</td>
                        <td>{{ $transaction->customer->customer_name }}</td>
                        <td>{{ $transaction->tenant->tenant_name }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
