<?php

namespace App\Filament\Pages;

use Filament\Forms; 
use Filament\Forms\Form; 
use Filament\Pages\Page; 
use Filament\Forms\Components\TextInput; 
use Filament\Notifications\Notification; 
use Illuminate\Support\Facades\Auth; 
use App\Models\User;

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
        $user = Auth::user();
        // Localize navigation label and title
        static::$navigationLabel = __('Settings');
        static::$title = __('Settings');
        $this->form->fill([
            'name' => $user->name,
            'email' => $user->email,
            'tiktok_url' => $user->tiktok_url,
            'instagram_url' => $user->instagram_url,
            'whatsapp_url' => $user->whatsapp_url,
            'x_url' => $user->x_url,
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
        $user = Auth::user();
        User::query()->whereKey($user->id)->update([
            'name' => $state['name'] ?? $user->name,
            'email' => $state['email'] ?? $user->email,
            'tiktok_url' => $state['tiktok_url'] ?? $user->tiktok_url,
            'instagram_url' => $state['instagram_url'] ?? $user->instagram_url,
            'whatsapp_url' => $state['whatsapp_url'] ?? $user->whatsapp_url,
            'x_url' => $state['x_url'] ?? $user->x_url,
        ]);

        Notification::make()
            ->title(__('Settings saved'))
            ->success()
            ->send();
    }
}