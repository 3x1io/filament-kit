<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use RalphJSmit\Filament\SEO\SEO;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use STS\FilamentImpersonate\Impersonate;
use Illuminate\Database\Eloquent\Builder;
use Humaidem\FilamentMapPicker\Fields\OSMMap;
use App\Filament\Resources\UserResource\Pages;
use pxlrbt\FilamentExcel\Actions\ExportAction;
use RalphJSmit\Filament\Components\Forms\Sidebar;
use RVxLab\FilamentColorPicker\Forms\ColorPicker;
use RalphJSmit\Filament\Components\Forms\Timestamps;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Johncarter\FilamentFocalPointPicker\Fields\FocalPointPicker;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?int $navigationSort = 9;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Sidebar::make()->schema([

                    TextInput::make('name')->required(),
                    TextInput::make('email')->email()->required(),
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->maxLength(255)
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                    Forms\Components\BelongsToManyMultiSelect::make('roles')->relationship('roles', 'name'),
                ], [

                    Grid::make(["default" => 1])->schema([
                        OSMMap::make('location')
                            ->label('Location')
                            ->showMarker()
                            ->draggable()
                            ->extraControl([
                                'zoomDelta'           => 1,
                                'zoomSnap'            => 0.25,
                                'wheelPxPerZoomLevel' => 60
                            ])
                            // tiles url (refer to https://www.spatialbias.com/2018/02/qgis-3.0-xyz-tile-layers/)
                            ->tilesUrl('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}'),
                        SpatieMediaLibraryFileUpload::make('avatar'),
                        FocalPointPicker::make('focal_point')
                            ->default('10% 25%') // default: "50% 50%"
                            ->imageField('avatar'),
                        SEO::make(),

                    ])
                ])->getSchema()[0]

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M j, Y')->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('M j, Y')->sortable(),

            ])
            ->prependActions([
                Impersonate::make('impersonate'), // <---
            ])
            ->bulkActions([
                ExportAction::make('export')
            ])
            ->filters([
                Tables\Filters\Filter::make('verified')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
                Tables\Filters\Filter::make('unverified')
                    ->query(fn (Builder $query): Builder => $query->whereNull('email_verified_at')),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
