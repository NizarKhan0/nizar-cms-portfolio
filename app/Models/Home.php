<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable = [
        'job_title',
        'intro',
        'description',
        'cta_link',
        'cta_text',
        'nizar_image',
    ];
}
