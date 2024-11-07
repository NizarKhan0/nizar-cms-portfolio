<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'feature_name',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_feature');
    }
}
