<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $fillable = [
        'position',
        'company_name',
        'location',
        'start_date',
        'end_date',
    ];
}
