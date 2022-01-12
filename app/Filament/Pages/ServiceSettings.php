<?php

namespace App\Filament\Pages;

use App\Settings\ServicesSettings;
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

class ServiceSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = ServicesSettings::class;

    protected static ?int $navigationSort = 12;

    protected static ?string $navigationGroup = 'Settings';


    protected function getFormSchema(): array
    {
        return [
            Grid::make()->schema([
                Toggle::make('sms_active'),
                Select::make('sms_gate')->options([
                    "messagebird" => "MessageBird",
                    "trello" => "Trello",
                    "sms-maser" => "SMS Masr",
                    "fms" => "FMC",
                ])->columnSpan(["2xl" => 12]),
                Repeater::make('sms_vendors')->schema([
                    TextInput::make('vendor'),
                    TextInput::make('secret'),
                    TextInput::make('email')->email(),
                ])->columnSpan(["2xl" => 12]),

                Toggle::make('shipping_active'),
                Select::make('shipping_gate')->options([
                    "dhl" => "DHL",
                    "aramix" => "Aramix",
                    "posta" => "Posta",
                    "green" => "Green Zone",
                    "quick" => "Quick SU",
                ])->columnSpan(["2xl" => 12]),
                Repeater::make('shipping_vendors')->schema([
                    TextInput::make('vendor'),
                    TextInput::make('secret'),
                    TextInput::make('email')->email(),
                ])->columnSpan(["2xl" => 12]),
                TextInput::make('fmc_key')->columnSpan(["2xl" => 12]),
                TextInput::make('fmc_secret')->columnSpan(["2xl" => 12]),
                TextInput::make('recap_key')->columnSpan(["2xl" => 12]),
                TextInput::make('recap_secret')->columnSpan(["2xl" => 12]),
                TextInput::make('google_search')->columnSpan(["2xl" => 12]),
                TextInput::make('google_an')->columnSpan(["2xl" => 12]),
                TextInput::make('facebook_pixcel')->columnSpan(["2xl" => 12]),
                TextInput::make('facebook_chat')->columnSpan(["2xl" => 12]),
                TextInput::make('facebook_app')->columnSpan(["2xl" => 12]),
                TextInput::make('addthis_key')->columnSpan(["2xl" => 12]),
            ])

        ];
    }
}
