<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Post;
use App\Models\Visit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Schema;
use Throwable;

class StatsOverview extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 1;

    public function content(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([
                Stat::make('Posts publicados', $this->count(fn () => Post::where('is_published', true)->count()))
                    ->description('Total en el blog')
                    ->descriptionIcon('heroicon-o-document-text')
                    ->color('success')
                    ->chart([3, 5, 4, 7, 6, 9, 8, 11]),

                Stat::make('Categorías', $this->count(fn () => Category::count()))
                    ->description('Secciones del contenido')
                    ->descriptionIcon('heroicon-o-folder')
                    ->color('info'),

                Stat::make('Visitas registradas', $this->count(fn () => (int) Visit::sum('count')))
                    ->description('Contador global')
                    ->descriptionIcon('heroicon-o-eye')
                    ->color('primary'),

                Stat::make('Visitas al blog', $this->count(fn () => (int) Post::sum('visits')))
                    ->description('Suma de vistas por post')
                    ->descriptionIcon('heroicon-o-chart-bar')
                    ->color('warning'),
            ]);
    }

    protected function count(callable $callback): int
    {
        try {
            return (int) $callback();
        } catch (Throwable) {
            return 0;
        }
    }
}
