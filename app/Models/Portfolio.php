<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'project_title',
        'project_description',
        'project_image_path',
        'project_link',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'portfolio_skill');
    }
}
