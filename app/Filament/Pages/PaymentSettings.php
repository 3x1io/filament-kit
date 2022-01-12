<?php

namespace App\Filament\Pages;

use App\Settings\PaymentsSettings;
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
use Filament\Forms\Components\Grid;


class PaymentSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = PaymentsSettings::class;

    protected static ?int $navigationSort = 11;

    protected static ?string $navigationGroup = 'Settings';


    public string $payment_gate;
    public bool $payment_online;
    public array $payment_vendors;

    protected function getFormSchema(): array
    {
        return [
            Grid::make()->schema([
                Toggle::make('payment_online'),
                Select::make('payment_gate')->options([
                    "paytabs" => "PayTabs",
                    "paymob" => "PayMob",
                    "paypal" => "Paypal",
                    "payfort" => "PayFort",
                    "strip" => "Strip",
                ])->columnSpan(["2xl" => 12]),
                Repeater::make('payment_vendors')->schema([
                    TextInput::make('vendor'),
                    TextInput::make('secret'),
                    TextInput::make('email')->email(),
                ])->columnSpan(["2xl" => 12]),
            ])


        ];
    }
}
