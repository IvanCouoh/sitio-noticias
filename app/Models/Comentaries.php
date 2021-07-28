<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;
class Comentaries extends Model
{
    use HasFactory;

    public function news(){
        return $this->belongsTo(News::class);
    }
}
