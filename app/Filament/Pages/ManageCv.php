<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageCv extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-up';

    protected static ?string $navigationLabel = 'Kelola CV';

    protected static ?string $title = 'Kelola CV';

    protected static ?string $slug = 'manage-cv';

    protected static string $view = 'filament.pages.manage-cv';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'cv_path' => Setting::get('cv_path'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('cv_path')
                    ->label('File CV (PDF)')
                    ->disk('public')
                    ->directory('cv')
                    ->acceptedFileTypes(['application/pdf'])
                    ->downloadable()
                    ->openable()
                    ->required(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Setting::set('cv_path', $data['cv_path']);

        Notification::make()
            ->title('CV berhasil disimpan')
            ->success()
            ->send();
    }
}
