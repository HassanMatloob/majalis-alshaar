<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $table = 'project_images';

    protected $fillable = [
        'name',
        'size',
        'path',
        'project_id'
    ];
}
