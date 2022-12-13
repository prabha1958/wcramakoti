<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pastor extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_name',
        'first_name',
        'last_name',
        'equal',
        'email',
        'mobile',
        'dob',
        'bio',
        'profile_photo'
    ];

    public function service(): HasMany {
        return $this->hasMany(Service::class);
    }
}
