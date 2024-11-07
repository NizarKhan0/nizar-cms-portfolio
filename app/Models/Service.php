<?php

namespace App\Models;

use App\Models\Feature;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service_package',
        'service_description',
        'service_price',
    ];

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'service_feature');
    }
}
