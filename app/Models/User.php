<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'razorpay_id',
        'family_name',
        'first_name',
        'last_name',
        'mobile',
        'email',
        'dob',
        'line1',
        'line2',
        'city',
        'state',
        'pin',
        'profile_photo_path',
        'password',
        'role',
        'area'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function subscription(): HasOne {
        return $this->hasOne(Subscription::class);
    }

    public function sploffering(): HasOne {
        return $this->hasOne(SplOffering::class);
    }

    public function isVerified(): bool {
       if(!$this->email_verified_at == ''){
        return true;
       }else{
        return false;
       }
    }

    public function isAdmin(): bool {
        $this->role = trim($this->role);
        if($this->role == 'admin'){
         return true;
        }else{
         return false;
        }
     }

     public function poorfeedings(): BelongsToMany {
        return $this->belongsToMany(PoorFeeding::class, 'poorfeeding_user');
     }



}
