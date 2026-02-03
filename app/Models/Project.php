<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'title',
        'arabic_title',
        'short_description',
        'arabic_short_description',
        'description',
        'arabic_description',
        'slug',

        'country',
        'province',
        'city',
        'property_location',

        'tags',
        'is_featured',
        'category_id',
        'status'
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function getTitleAttribute($value)
    {
        $lang = session('locale', config('app.locale'));
        if (!$lang) {
            $lang = 'en';
        }
        if ($lang == 'ar') {
            return $this->arabic_title;
        } else {
            return $value;
        }
    }

    public function getShortDescriptionAttribute($value)
    {
        $lang = session('locale', config('app.locale'));
        if (!$lang) {
            $lang = 'en';
        }
        if ($lang == 'ar') {
            return $this->arabic_short_description;
        } else {
            return $value;
        }
    }

    public function getDescriptionAttribute($value)
    {
        $lang = session('locale', config('app.locale'));
        if (!$lang) {
            $lang = 'en';
        }
        if ($lang == 'ar') {
            return $this->arabic_description;
        } else {
            return $value;
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class, 'project_id', 'id');
    }
}
