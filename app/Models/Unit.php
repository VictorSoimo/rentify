<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'property_id',
        'unit_number',
        'status',
        
    ];
    
    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function tenant(){
        return $this->hasOne(Tenant::class, 'unit_id');
    }

    public function rentCollections(){
        return $this->hasMany(RentCollection::class, 'unit_id');
    }

    public function statusChangeRequests(){
        return $this->hasMany(UnitStatusChange::class, 'unit_id');
    }
}


