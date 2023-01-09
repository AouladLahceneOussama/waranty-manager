<div>
    @forelse($medias as $media)
    <div class="bg-teal-50 shadow-md rounded-md mb-4 py-2 px-4" key="{{$media->id}}">
        <div class="flex justify-between items-center">
            <div class="flex justify-start items-center space-x-2">
                <i class="fa-solid fa-file text-teal-500 text-xs"></i>
                <span class="text-xs font-semibold">{{ $media->name }}</span>
                <span class="text-xs text-gray-300 font-semibold ml-4">{{ $media->created_at->diffForHumans() }}</span>
            </div>

            <div>
                <a href="/storage/{{base64_decode($media->identifier)}}" target="_blank" ><i class="fa-solid fa-eye text-teal-700 hover:text-teal-600 ml-1 text-xs duration-150 ease-in-out cursor-pointer"></i></a>
                <a href="/storage/{{base64_decode($media->identifier)}}" download><i class="fa-solid fa-download text-teal-500 hover:text-teal-600 ml-1 text-xs duration-150 ease-in-out cursor-pointer"></i></a>
                <i wire:click.prevent="delete({{ $media->id }})" class="fa-solid fa-trash text-red-500 hover:text-red-600 ml-1 text-xs duration-150 ease-in-out cursor-pointer"></i>
            </div>
        </div>
    </div>
    @empty
    <div class="bg-teal-50 shadow-md rounded-md mb-4 py-2 px-4 text-center">
        <span class="font-semibold text-xs">Il n'y a pas des fichiers dans ce dossier.</span>
    </div>
    @endforelse
</div>