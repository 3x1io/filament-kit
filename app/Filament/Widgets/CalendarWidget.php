<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    public function getViewData(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Breakfast!',
                'start' => now()
            ],
            [
                'id' => 2,
                'title' => 'Meeting with Pamela',
                'start' => now()->addDay(),
                'url' => url('admin')
            ]
        ];
    }
}
