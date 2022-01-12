<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Pagination\Paginator;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Filament::registerNavigationItems([
            NavigationItem::make()
                ->group('Settings')
                ->icon('heroicon-o-translate')
                ->label('Change Language')
                ->sort(10)
                ->url(url('admin/change')),
        ]);

        if (app()->isLocal()) {
            Filament::registerNavigationItems([
                NavigationItem::make()
                    ->group('Dev')
                    ->icon('heroicon-o-code')
                    ->label('Artisan')
                    ->sort(10)
                    ->url(url('admin/artisan')),
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
