@php($title = __('Settings'))
<x-filament::page>
    <div class="space-y-6">
        <div>
            <h2 class="text-xl font-semibold">{{ __('Settings') }}</h2>
            <p class="text-sm text-gray-500">{{ __('Update your account information.') }}</p>
        </div>

        {{ $this->form }}

        <div>
            <x-filament::button wire:click="submit" color="primary">
                {{ __('Save') }}
            </x-filament::button>
        </div>
    </div>
</x-filament::page>