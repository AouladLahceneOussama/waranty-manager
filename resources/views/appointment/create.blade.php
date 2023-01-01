<div class="px-4 mt-5 w-full">
    <div class="w-full flex flex-wrap items-end">

        <div class="w-full mb-2">
            <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="nom">
                {{ __('Nom') }}
            </label>
            <input wire:model="name" type="text" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Nom de l'assuré" id="nom" />
            @error('name')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full mb-2">
            <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="date">
                {{ __('date') }}
            </label>
            <input wire:model="date" type="datetime-local" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Prénom de l'assuré" id="prenom" />
            @error('date')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full">
            @if(!$updating)
            <button wire:click.prevent="add" class="w-full px-4 py-2 bg-teal-600 border rounded-md font-semibold text-xs text-white uppercase hover:bg-teal-700 focus:outline-none focus:border-gray-900 disabled:opacity-25 transition">
                {{ __('Ajouter rendez-vous') }}
            </button>
            @else
            <div class="flex justify-center items-center">
                <button wire:click.prevent="edit" class="w-full md:w-1/2 px-4 py-2 bg-teal-600 border rounded-md font-semibold text-xs text-white uppercase hover:bg-teal-700 focus:outline-none focus:border-gray-900 disabled:opacity-25 transition">
                    {{ __('Modifier rendez-vous') }}
                </button>
                <button wire:click.prevent="cancelEdit" class="w-full md:w-1/2 px-4 py-2 bg-red-600 border rounded-md font-semibold text-xs text-white uppercase hover:bg-red-700 focus:outline-none focus:border-gray-900 disabled:opacity-25 transition">
                    {{ __('Annuler') }}
                </button>
            </div>
            @endif
        </div>
    </div>
</div>