<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name',
        'location',
        'caretaker_id',
        'manager_id',
    
    ];

    public function propertyManager(){
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function propertyCaretaker(){
        return $this->belongsTo(User::class, 'caretaker_id');
    }

    public function propertyUnits(){
        return $this->hasMany(Unit::class, 'property_id');
    }

    public function propertyExpenses(){
        return $this->hasMany(Expense::class, 'property_id');
    }

    public function propertyServiceRequests(){
        return $this->hasMany(ServiceRequest::class, 'property_id');
    }
}
