<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentCollection extends Model
{
    protected $fillable = [
        'unit_id',
        'tenant_id',
        'month',
        'submitted_by',
        'amount_due',
        'amount_paid',
        'date_paid',
        'status',
    ];

    public function submittedBy(){
        return $this->belongsTo(User::class, 'submitted_by');
    }

    public function unitPaid(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function paidBy(){
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

   
}
