<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'venue',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'price',
        'image',
        'status',
    ];
}
