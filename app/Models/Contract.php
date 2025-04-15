<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'start_date',
        'tenant_id',
        'document_url',
    ];

    public function contractOwner(){
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    
}
