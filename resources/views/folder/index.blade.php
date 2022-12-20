<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dossiers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <button class="mb-4 px-6 py-3 font-bold text-center text-white uppercase border-0 rounded-md cursor-pointer text-xs shadow-md bg-indigo-400 hover:bg-indigo-500 duration-300 ease-in-out ">
                <a class="w-full h-full" href="{{ route('folder.create') }}">{{ __('Nouveau Dossier') }}</a>
            </button>
            @livewire('folder.show')
        </div>
    </div>
</x-app-layout>