<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'property_id',
        'decription',
        'amount',
        'submitted_by',
    ];

    public function propertyExpense(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function submittedBy(){
        return $this->belongsTo(User::class, 'submitted_by');
    }
}


