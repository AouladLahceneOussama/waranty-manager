<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dossiers') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[url('https://www.looknbe.com/wp-content/uploads/2021/10/assurance-sante.jpg')] bg-no-repeat bg-cover bg-center bg-fixed">
        <div class="max-w-7xl mx-auto py-4 px-6 lg:px-8 bg-white bg-opacity-60 rounded">
            <button class="mb-4 px-6 py-3 font-bold text-center text-white uppercase border-0 rounded-md cursor-pointer text-xs shadow-md bg-teal-600 hover:bg-teal-700 duration-300 ease-in-out ">
                <a class="w-full h-full" href="{{ route('folder.create') }}">{{ __('Nouveau Dossier') }}</a>
            </button>
            <livewire:folder.show />
        </div>
    </div>
</x-app-layout>