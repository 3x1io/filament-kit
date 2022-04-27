<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Pagination\Paginator;
use RyanChandler\FilamentTools\Tool;
use RyanChandler\FilamentTools\Tools;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;
use Filament\Forms\Components\TextInput;
use Reworck\FilamentSettings\FilamentSettings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        Paginator::useBootstrap();


        if (app()->isLocal()) {
            Filament::registerNavigationItems([
                NavigationItem::make()
                    ->group('Dev')
                    ->icon('heroicon-o-database')
                    ->label('Schema')
                    ->sort(10)
                    ->url(url('schematics')),
            ]);
        }

        Filament::registerNavigationGroups([
            'PMS',
            'CMS',
            'Settings',
            'Dev',
        ]);
    }
}
