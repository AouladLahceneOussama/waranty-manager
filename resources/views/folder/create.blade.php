<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Nouveau Dossier') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[url('https://www.looknbe.com/wp-content/uploads/2021/10/assurance-sante.jpg')] bg-no-repeat bg-cover bg-center bg-fixed">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="bg-white  bg-opacity-70  overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mb-4">
                    @livewire('folder.form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
