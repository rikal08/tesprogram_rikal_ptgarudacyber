<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();

        return view('tenant', compact('tenants'));
    }

    public function create()
    {
        return view('create-tenant');
    }

    public function store(Request $request)
    {
        $tenant = new Tenant;
        $tenant->tenant_name = $request->name;
        $tenant->tenant_phone = $request->phone;

        $tenant->save();

        return redirect('/tenants')->with('message', 'Registrasi berhasil!');
    }
}
