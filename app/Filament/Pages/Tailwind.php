<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;

class Tailwind extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.tailwind';

    public $name;
    public $users;

    public function mount()
    {
        $this->users = [
            "ahmed",
            "hag ahmed"
        ];

        $this->name = "ahmed";
    }

    public function onSubmit()
    {
        array_push($this->users, $this->name);
    }
}
