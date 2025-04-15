<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
            'unit_id',
            'first_name',
            'last_name',
            'phone',
    ];

    public function assignedUnit(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function houseContract(){
        return $this->hasOne(Contract::class, 'tenant_id');
    }

    public function rentCollections(){
        return $this->hasMany(RentCollection::class, 'tenant_id');
    }
}
