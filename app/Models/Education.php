<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'education_name',
        'institution_name',
        'institution_address',
        'education_start_date',
        'education_end_date',
    ];
}
