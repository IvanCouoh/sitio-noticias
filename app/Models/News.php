<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comentaries;
class News extends Model
{
    use HasFactory;

    public function comentaries(){
        return $this->hasMany(Comentaries::class);
    }

    public function category (){
        return $this->belongsTo(Categories::class);
    }
}
