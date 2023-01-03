<div class="px-4">
    <div class="w-full">
        <div class="flex justify-between items-center">
            <span class="text-teal-600 text-xl ">{{ __('Rendez-vous') }}</span>
        </div>
        <div class="bg-gray-300 my-2 w-full h-px"></div>
    </div>

    <div class="h-40 overflow-y-auto">
        @forelse($appointments as $appointment)
        <div class="flex justify-between items-center bg-white shadow-md rounded-md mb-2 py-2 px-4" key="{{ $appointment->id }}">
            <span class="text-xs text-green-600">{{ $appointment->name }}</span>
            <div>
                <span class="text-xs font-semibold mr-4 ">{{ $appointment->date->diffForHumans() }}</span>
                <i wire:click.prevent="edit({{ $appointment->id }})" class="fa-solid fa-pen text-green-500 hover:text-green-600 ml-1 text-xs duration-150 ease-in-out cursor-pointer"></i>
                <i wire:click.prevent="delete({{ $appointment->id }})" class="fa-solid fa-trash text-red-500 hover:text-red-600 ml-1 text-xs duration-150 ease-in-out cursor-pointer"></i>
            </div>
        </div>
        @empty
        <div>
            Il n'y a pas de rendez-vous pour ce moment.
        </div>
        @endforelse
    </div>

</div>