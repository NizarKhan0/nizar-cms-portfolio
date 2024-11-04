<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'number_phone',
        'email',
        'address',
        'contact_logo',
    ];
}
