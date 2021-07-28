<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function article(){
        return $this->hasMany(Article::class);
    }

    public function category_group(){
        return $this->belongsTo(CategoryGroup::class);
    }
}
