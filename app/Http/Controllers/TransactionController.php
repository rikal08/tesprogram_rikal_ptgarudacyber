<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Voucher;
use App\Models\Customer;
use App\Models\Tenant;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('customer')->get();
        return view('transactions', compact('transactions'));
    }

    public function create()
    {
        $customers = Customer::all();
        $tenants = Tenant::all();
        return view('create-transaction', compact('customers','tenants'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'customer_id' => 'required',
            'tenant_id' => 'required',
            'amount' => 'required|numeric|min:0',
            
        ]);

        $invoiceId = uniqid('INV');

        // Simpan transaksi
        $transaction = new Transaction([
            'customer_id' => $request->customer_id,
            'tenant_id' => $request->tenant_id,
            'amount' => $request->amount,
            'transaction_id' => $invoiceId
        ]);
        $transaction->save();

        // Cek apakah pelanggan berhak mendapatkan voucher
        if ($transaction->amount >= 1000000) {
            // Berikan voucher
            $this->generateVoucher($transaction->customer_id, $transaction->transaction_id);
        }

        return redirect('/transactions')->with('message', 'Transaksi berhasil!');
    }

    protected function generateVoucher($customerId, $invoiceId)
    {
        // Logika untuk menghasilkan voucher
        $voucher = new Voucher([
            'customer_id' => $customerId,
            'transaction_id' => Transaction::where('transaction_id', $invoiceId)->first()->id,
            'voucher_code' => uniqid(),
            'expired_at' => Carbon::now()->addMonths(3),
        ]);
        $voucher->save();
    }


}
