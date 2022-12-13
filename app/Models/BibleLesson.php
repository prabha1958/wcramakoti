<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BibleLesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'verse1',
        'lesson1',
        'verse2',
        'lesson2',
        'verse3',
        'lesson3',
        'verse4',
        'lesson4',
        'dt',
    ];

    public function service(): HasMany {
        return $this->hasMany(Service::class);
    }
}
