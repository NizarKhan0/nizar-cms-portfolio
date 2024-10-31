<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'main_title',
        'service_title',
        'service_description',
    ];
}
