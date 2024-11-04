<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $fillable = [
        'job_position',
        'company_name',
        'company_address',
        'work_start_date',
        'work_end_date',
    ];
}
