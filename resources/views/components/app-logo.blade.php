@props([
    'sidebar' => false,
])

@if($sidebar)
    <flux:sidebar.brand name="Sales Page Generator" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-10 items-center justify-center rounded-2xl shadow-lg shadow-blue-500/20">
            <x-app-logo-icon class="size-10" />
        </x-slot>
    </flux:sidebar.brand>
@else
    <flux:brand name="Sales Page Generator" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-10 items-center justify-center rounded-2xl shadow-lg shadow-blue-500/20">
            <x-app-logo-icon class="size-10" />
        </x-slot>
    </flux:brand>
@endif