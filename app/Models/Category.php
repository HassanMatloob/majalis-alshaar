<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'arabic_name',
        'parent_id',
        'order',
        'status'
    ];

    public function getNameAttribute($value)
    {
        $lang = session('locale', config('app.locale'));
        if (!$lang) {
            $lang = 'en';
        }
        if ($lang == 'ar') {
            return $this->arabic_name;
        } else {
            return $value;
        }
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id', 'id');
    }
}
