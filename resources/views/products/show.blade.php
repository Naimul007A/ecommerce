<x-app-layout>
    <x-slot name="title">
        {{ __($slug) }}
    </x-slot>
    <livewire:single-product :post="$slug" />
</x-app-layout>
