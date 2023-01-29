<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Nouveau Utilisateur') }}
        </h2>
    </x-slot>

    <div class="h-screen py-12 bg-[url('https://www.looknbe.com/wp-content/uploads/2021/10/assurance-sante.jpg')] bg-no-repeat bg-cover bg-center bg-fixed">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:user.form />
            </div>
        </div>
    </div>
</x-app-layout>