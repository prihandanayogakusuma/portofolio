<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillResource\Pages;
use App\Models\Skill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SkillResource extends Resource
{
    protected static ?string $model = Skill::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('proficiency_percentage')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->maxValue(100),
                Forms\Components\TextInput::make('category')
                    ->maxLength(255)
                    ->nullable(),
               Forms\Components\Textarea::make('icon')
    ->label('Icon (Raw SVG Code)')
    ->rows(5)
    ->nullable(),
            ]);
    }

   public static function table(Table $table): Table
{
    return $table
        ->columns([
            // Ganti ImageColumn dengan TextColumn atau limit teksnya agar tabel tidak rusak
            Tables\Columns\TextColumn::make('icon')
                ->label('SVG Code')
                ->limit(30) // Membatasi panjang teks SVG yang ditampilkan di tabel agar rapi
                ->searchable(),
            Tables\Columns\TextColumn::make('name')
                ->searchable(),
            Tables\Columns\TextColumn::make('proficiency_percentage')
                ->numeric()
                ->sortable()
                ->suffix('%'),
            Tables\Columns\TextColumn::make('category')
                ->searchable(),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSkills::route('/index'),
            'create' => Pages\CreateSkill::route('/create'),
            'edit' => Pages\EditSkill::route('/edit/{record}'),
        ];
    }
}