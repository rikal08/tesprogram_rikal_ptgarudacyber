<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $all_customers = Customer::all();

        return view('customer',compact('all_customers'));
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->customer_name = $request->name;
        $customer->customer_phone = $request->phone;
        $customer->email = $request->email;
      
        $customer->save();

        return redirect('/customers')->with('message', 'Registrasi berhasil!');
    }

    public function getCustomers(Request $request)
    {
        $query = $request->input('query');
        
        $customers = Customer::where('customer_name', 'like', '%' . $query . '%')->get();
        
        return response()->json($customers);
    }

}
