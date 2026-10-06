<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Support\Icons\Heroicon;

class Dashboard extends BaseDashboard
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Home;

    protected static string|null $navigationLabel = 'Dashboard';

    protected static string|null $title = 'Panel de control';

    protected static int|null $navigationSort = 1;
}
