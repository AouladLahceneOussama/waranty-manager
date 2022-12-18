<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nouveau Dossier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mb-4">
                    <form class="w-full py-2 px-8 mt-4 h-full">
                        <div class="w-full mb-3">
                            <span class="text-gray-400 text-xs ">{{ __('Information general de dossier')}}</span>
                            <div class="bg-gray-200 w-full h-px"></div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-4">

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="compagnie">
                                    {{ __('Compagnie') }}
                                </label>
                                <input wire:model="compagnie" type="text" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Compagnie" id="compagnie" />
                                @error('compagnie') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="souscripteur">
                                    {{ __('Souscripteur') }}
                                </label>
                                <input wire:model="souscripteur" type="text" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Souscripteur" id="souscripteur" />
                                @error('souscripteur') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <div class="flex flex-wrap -mx-3 mb-4">

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="cotisation_ht">
                                    {{ __('Cotisation HT') }}
                                </label>
                                <input wire:model="cotisation_ht" type="number" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Cotisation en HT" id="cotisation_ht" />
                                @error('cotisation_ht') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="cotisation_ttc">
                                    {{ __('Cotisation TTC') }}
                                </label>
                                <input wire:model="cotisation_ttc" type="number" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Cotisation en TTC" id="cotisation_ttc" />
                                @error('cotisation_ttc') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <div class="flex flex-wrap -mx-3 mb-4">

                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="date_effet">
                                    {{ __('Date effet') }}
                                </label>
                                <input wire:model="date_effet" type="date" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Cotisation en HT" id="date_effet" />
                                @error('date_effet') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <div class="w-full mb-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400 text-xs ">{{ __('Asuure Informations')}}</span>
                                <!-- <a href="" class="bg-green-300 py-1 px-3 rounded-md text-xs cursor-pointer mb-1">{{ __('New Store')}}</a> -->
                            </div>
                            <div class="bg-gray-200 w-full h-px"></div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-4">

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="nom">
                                    {{ __('Nom') }}
                                </label>
                                <input wire:model="nom" type="text" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Nom d'assure" id="nom" />
                                @error('nom') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="prenom">
                                    {{ __('Prenom') }}
                                </label>
                                <input wire:model="prenom" type="text" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Prenom d'assure" id="prenom" />
                                @error('prenom') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <div class="flex flex-wrap -mx-3 mb-4">

                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="pays_naissance">
                                    {{ __('Pays de naissance') }}
                                </label>
                                <input wire:model="pays_naissance" type="text" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Pays de naissance" id="pays_naissance" />
                                @error('pays_naissance') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="date_naissance">
                                    {{ __('Date de naissance') }}
                                </label>
                                <input wire:model="date_naissance" type="date" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Date de naissance" id="date_naissance" />
                                @error('date_naissance') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="departement_naissance">
                                    {{ __('Departement de naissance') }}
                                </label>
                                <input wire:model="departement_naissance" type="date" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Departement de naissance" id="departement_naissance" />
                                @error('departement_naissance') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <div class="flex flex-wrap -mx-3 mb-4">

                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="primary_phone">
                                    {{ __('Numero Telephone primaire') }}
                                </label>
                                <input wire:model="primary_phone" type="tel" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Numero telephone primaire" id="primary_phone" />
                                @error('primary_phone') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="secondary_phone">
                                    {{ __('Numero Telephone secondaire') }}
                                </label>
                                <input wire:model="secondary_phone" type="tel" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Numero telephone secondaire" id="secondary_phone" />
                                @error('secondary_phone') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="email">
                                    {{ __('Email') }}
                                </label>
                                <input wire:model="email" type="email" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="jhon.doe@gmail.com" id="email" />
                                @error('email') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <div class="flex flex-wrap -mx-3 mb-4">

                            

                        </div>
                    </form>

                    <button wire:click="create" class="px-8 py-2 bg-indigo-400 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-gray-900 disabled:opacity-25 transition">
                        {{ __('Add') }}
                    </button>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>