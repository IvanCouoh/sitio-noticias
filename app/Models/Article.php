<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','author','category_id'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function category (){
        return $this->belongsTo(Category::class);
    }
}
