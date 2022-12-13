<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PoorFeeding extends Model
{
    use HasFactory;

    protected $fillable = [
        'sponsored1',
        'sponsored2',
        'sponsored3',
        'dt_of_pf',
        'no_meals',
        'volunteer1',
        'volunteer2',
        'volunteer3',
        'volunteer4',
        'pf_photo1',
        'pf_photo2',
        'pf_photo3',
        'pf_photo4',
        'summary'
    ];

    public function users():BelongsToMany {
        return $this->belongsToMany(User::class, 'poorfeeding_user');
    }

    public function sponsors(): BelongsToMany {
        return $this->belongsToMany(User::class,'poorfeeding_sponsor');
    }




}
