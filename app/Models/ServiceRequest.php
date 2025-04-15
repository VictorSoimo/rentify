<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = [
        'property_id',
        'description',
        'unit_id',
        'status',
        'submitted_by',
        'approved_by',
        
    ];

    public function submittedBy(){
        return $this->belongsTo(User::class, 'submitted_by');
    }

    public function approvedBy(){
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    
}
