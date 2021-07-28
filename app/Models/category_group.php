<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_group extends Model
{
    use HasFactory;

    public function categories(){
        return $this->hasMany(Categories::class);
    }
}
