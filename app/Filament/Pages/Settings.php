<?php

namespace App\Filament\Pages;

use Filament\Forms; 
use Filament\Forms\Form; 
use Filament\Pages\Page; 
use Filament\Forms\Components\TextInput; 
use Filament\Notifications\Notification; 
use App\Models\Setting;

class Settings extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = null;
    protected static ?string $title = null;
    protected static ?int $navigationSort = 9999;
    protected static string $view = 'filament.pages.settings';

    public ?array $data = [];

    public function mount(): void
    {
        // Localize navigation label and title
        static::$navigationLabel = __('Settings');
        static::$title = __('Settings');
        $this->form->fill([
            'name' => Setting::get('site_name'),
            'email' => Setting::get('contact_email'),
            'tiktok_url' => Setting::get('tiktok_url'),
            'instagram_url' => Setting::get('instagram_url'),
            'whatsapp_url' => Setting::get('whatsapp_url'),
            'x_url' => Setting::get('x_url'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label(__('Email'))
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('tiktok_url')
                    ->label(__('TikTok URL'))
                    ->url()
                    ->maxLength(255)
                    ->placeholder('https://www.tiktok.com/@username')
                    ->columnSpanFull(),

                TextInput::make('instagram_url')
                    ->label(__('Instagram URL'))
                    ->url()
                    ->maxLength(255)
                    ->placeholder('https://www.instagram.com/yourprofile')
                    ->columnSpanFull(),

                TextInput::make('whatsapp_url')
                    ->label(__('WhatsApp URL'))
                    ->url()
                    ->maxLength(255)
                    ->placeholder('https://wa.me/123456789')
                    ->columnSpanFull(),

                TextInput::make('x_url')
                    ->label(__('X (Twitter) URL'))
                    ->url()
                    ->maxLength(255)
                    ->placeholder('https://x.com/yourhandle')
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $state = $this->form->getState();

        Setting::set('site_name', $state['name'] ?? null);
        Setting::set('contact_email', $state['email'] ?? null);
        Setting::set('tiktok_url', $state['tiktok_url'] ?? null);
        Setting::set('instagram_url', $state['instagram_url'] ?? null);
        Setting::set('whatsapp_url', $state['whatsapp_url'] ?? null);
        Setting::set('x_url', $state['x_url'] ?? null);

        Notification::make()
            ->title(__('Settings saved'))
            ->success()
            ->send();
    }
}