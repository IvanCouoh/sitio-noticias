<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public function news(){
        return $this->hasMany(News::class);
    }

    public function categories(){
        return $this->belongsTo(category_group::class);
    }
}
