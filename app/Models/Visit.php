<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Throwable;

class Visit extends Model
{
    protected $fillable = [
        'page_name',
        'count',
    ];

    public static function record(string $pageName): void
    {
        try {
            if (! Schema::hasTable('visits')) {
                return;
            }

            $visit = static::firstOrCreate(['page_name' => $pageName]);
            $visit->increment('count');
        } catch (Throwable) {
            // El tracking de visitas nunca debe romper el sitio.
        }
    }
}
