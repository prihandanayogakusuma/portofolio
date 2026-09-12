<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'thumbnail',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function ratings(): HasMany
    {
        return $this->hasMany(ArticleRating::class);
    }
}