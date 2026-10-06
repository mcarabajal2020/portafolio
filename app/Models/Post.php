<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'content',
        'author',
        'featured',
        'is_published',
        'visits',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'visits' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (Post $post) {
            if (blank($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getFeaturedUrlAttribute(): ?string
    {
        if (blank($this->featured)) {
            return null;
        }

        if (str_starts_with($this->featured, 'http://') || str_starts_with($this->featured, 'https://')) {
            return $this->featured;
        }

        if (Storage::disk('public')->exists($this->featured)) {
            return Storage::disk('public')->url($this->featured);
        }

        return asset($this->featured);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
