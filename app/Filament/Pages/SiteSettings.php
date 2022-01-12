<?php

namespace App\Filament\Pages;

use App\Settings\SitesSettings;
use Filament\Pages\SettingsPage;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;


class SiteSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = SitesSettings::class;

    protected static ?int $navigationSort = 10;

    protected static ?string $navigationGroup = 'Settings';


    protected function getFormSchema(): array
    {
        return [
            Grid::make()->schema([
                TextInput::make('site_name')->columnSpan(["2xl" => 6]),
                TextInput::make('site_author')->columnSpan(["2xl" => 6]),
                TextInput::make('site_email')->columnSpan(["2xl" => 6]),
                TextInput::make('site_phone')->columnSpan(["2xl" => 6]),
                TextArea::make('site_description')->columnSpan(["2xl" => 12]),
                TextArea::make('site_keywords')->columnSpan(["2xl" => 12]),
                TextArea::make('site_address')->columnSpan(["2xl" => 12]),
                TextInput::make('site_phone_code')->columnSpan(["2xl" => 4]),
                TextInput::make('site_location'),
                TextInput::make('site_currency'),
                TextInput::make('site_language'),
                FileUpload::make('site_profile')->columnSpan(["2xl" => 12]),
                FileUpload::make('site_logo')->columnSpan(["2xl" => 12]),
                Repeater::make('site_social')->columnSpan(["2xl" => 12])->schema([
                    TextInput::make('vendor'),
                    TextInput::make('link')->url(),
                ]),
                Repeater::make('site_menu')->columnSpan(["2xl" => 12])->schema([
                    TextInput::make('title_ar'),
                    TextInput::make('title'),
                    TextInput::make('link'),
                ]),
            ])

        ];
    }
}
