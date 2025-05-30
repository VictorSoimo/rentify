<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'created_by',
        'created_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function createdUsers(){
        return $this->hasMany(User::class, 'created_by');
    }

    public function propertiesManaged(){
        return $this->hasMany(Property::class, 'managed_by');

    }

    public function propertiesCaretaken(){
        return $this->hasOne(Property::class, 'caretaker_id');

    }
    public function submitedRentCollections(){
        return $this->hasMany(RentCollection::class, 'submitted_by');
    }

    public function submittedExpenses(){
        return $this->hasMany(Expense::class, 'submitted_by');
    }

    public function approvedRequests(){
        return $this->hasMany(ServiceRequest::class, 'approved_by');

    }
}
