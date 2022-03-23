<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\File;

class Browser extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.browser';

    protected function getViewData(): array
    {
        $folders =  File::directories(base_path());
        $files =  File::files(base_path());
        $foldersArray = [];
        $filesArray = [];

        foreach ($folders as $folder) {
            array_push($foldersArray, [
                "path" => $folder,
                "name" => str_replace(base_path() . '/', '', $folder),
            ]);
        }

        foreach ($files as $file) {
            array_push($filesArray, [
                "path" => $file,
                "name" => str_replace(base_path() . '/', '', $file),
            ]);
        }

        return [
            "folders" => $foldersArray,
            "files" => $filesArray
        ];
    }
}
