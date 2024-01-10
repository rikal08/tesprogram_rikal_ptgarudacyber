<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Voucher;
use App\Models\Transaction;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $voucher = Voucher::with('customer','transaction')->get();

        return view('vouchers',compact('voucher'));
    }

    public function formRedeem()
    {
        $tenants= Tenant::all();
        return view('form-redeem-voucher', compact('tenants'));
    }

    public function redeemVoucher(Request $request)
    {
        $voucherCode = $request->input('voucher_code');
    

        // Validasi formulir jika diperlukan

        // Mencari voucher berdasarkan kode unik
        $voucher = Voucher::where('voucher_code', $voucherCode)
            ->whereNull('redeemed_at') // Memastikan voucher belum pernah digunakan
            ->where('expired_at', '>=', now()) // Memastikan voucher masih berlaku
            ->where('customer_id', $request->customer_id) // Memastikan voucher masih berlaku
            ->first();

        if (!$voucher) {
            return redirect()->back()->with('message', 'Voucher tidak valid atau sudah digunakan.');
        }

       // Simulasi memberikan diskon sejumlah 10 ribu rupiah
       $discountAmount = 10000;
       $invoiceId = uniqid('INV');

       // Simpan informasi transaksi dengan memberikan diskon ke pelanggan
       $transaction = new Transaction([
           'customer_id' => $request->customer_id,
           'tenant_id' => $request->input('tenant_id'),
           'amount' => $request->input('amount') - $discountAmount, // Total belanja setelah diskon
           'transaction_id' => $invoiceId,
       ]);
       $transaction->save();
        // Tandai voucher sebagai sudah digunakan
        $voucher->update(['redeemed_at' => now()]);

        return redirect()->back()->with('message', 'Voucher berhasil diredeem.');
    }
}
