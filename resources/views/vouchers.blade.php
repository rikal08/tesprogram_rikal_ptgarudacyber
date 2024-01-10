<!-- resources/views/transactions.blade.php -->
@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
    <div class="container mt-5">
        <h1>Daftar Voucher Pelanggan</h1>

       
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Transaksi ID</th>
                    <th>Voucher Code</th>
                    <th>Nama Pelanggan</th>
                    <th>Expired At</th>
                    <th>Redeemed At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($voucher as $voucher)
                    <tr>
                        <td>{{ $voucher->id }}</td>
                        <td>{{ $voucher->transaction->transaction_id }}</td>
                        <td>{{ $voucher->voucher_code }}</td>
                        <td>{{ $voucher->customer->customer_name }}</td>
                        <td>{{ $voucher->expired_at }}</td>
                        <td>{{ $voucher->redeemed_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
