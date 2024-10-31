<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'education_name',
        'institution_name',
        'location',
        'start_date',
        'end_date',
    ];
}
