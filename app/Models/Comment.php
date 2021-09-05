<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['author', 'email', 'message', 'article_id'];

    protected $casts = [
        'is_banned' => 'boolean',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
