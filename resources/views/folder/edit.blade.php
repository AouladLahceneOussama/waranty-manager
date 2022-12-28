<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le Dossier') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[url('https://www.looknbe.com/wp-content/uploads/2021/10/assurance-sante.jpg')] bg-no-repeat bg-cover bg-center bg-fixed">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="bg-white  bg-opacity-70  overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mb-4">
                    <livewire:folder.form-edit :folderId="$folderId">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
