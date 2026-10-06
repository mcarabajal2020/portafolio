<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'page_name',
        'count',
    ];

    public static function record(string $pageName): void
    {
        $visit = static::firstOrCreate(['page_name' => $pageName]);
        $visit->increment('count');
    }
}
