<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table ="invoice";
    protected $fillable = [
        'customer_id',
        'tenant_id',
        'amount',
        'transaction_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }
}
