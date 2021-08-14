<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_group_id'];

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function category_group(){
        return $this->belongsTo(CategoryGroup::class);
    }
}
