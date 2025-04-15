<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitStatusChange extends Model
{
    
    protected $fillable = [
        'unit_id',
        'requested_status',
        'requested_by',
        'approved_by',
        'status'
    ];
    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function requestedBy(){
        return $this->belongsTo(User::class, 'appro');
    }

    public function approvedBy(){
        return $this->belongsTo(User::class, 'approved_by');
    }
    
}
