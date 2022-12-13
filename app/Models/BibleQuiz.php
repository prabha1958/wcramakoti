<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BibleQuiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'optn1',
        'optn2',
        'optn3',
        'optn4',
        'ans'
    ];
}
