<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChurchService extends Model
{
    use HasFactory;

    protected $fillable = [
        'dt_service',
        'time',
        'theme',
        'theme_photo',
        'sermon',
        'audience_photo',
        'choir_photo',
        'pastor_photo',
        'pastor_id',
        'biblelesson_id'
    ];

    public function biblelession(): BelongsTo {
        return $this->belongsTo(BibleLesson::class);
    }

    public function pastor(): BelongsTo {
        return $this->belongsTo(Pastor::class);
    }
}
