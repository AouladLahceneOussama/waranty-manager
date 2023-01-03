<div class="px-4">
    <div class="w-full">
        <div class="flex justify-between items-center">
            <span class="text-teal-600 text-xl ">{{ __('Commentaires') }}</span>
        </div>
        <div class="bg-gray-300 my-2 w-full h-px"></div>
    </div>

    <div class="h-40 overflow-y-auto">
        @forelse($comments as $comment)
        <div class="bg-white shadow-md rounded-md my-2 py-2 px-4" key="{{$comment->id}}">
            <div class="flex justify-between items-center">
                <div class="flex justify-start items-center space-x-2">
                    @if($comment->status == "URGENT")
                    <div class="w-2 h-2 bg-red-600 rounded-full"></div>
                    <div>
                        <span class="text-xs text-red-600">{{ $comment->status }}</span>
                        <span class="text-xs font-semibold ml-4">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    @endif
                    @if($comment->status == "EN_COURS")
                    <div class="w-2 h-2 bg-orange-600 rounded-full"></div>
                    <div>
                        <span class="text-xs text-orange-600">{{ $comment->status }}</span>
                        <span class="text-xs font-semibold ml-4">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    @endif
                    @if($comment->status == "INFORMATIVE")
                    <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                    <div>
                        <span class="text-xs text-blue-600">{{ $comment->status }}</span>
                        <span class="text-xs font-semibold ml-4">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    @endif
                    @if($comment->status == "COMPLET")
                    <div class="w-2 h-2 bg-green-600 rounded-full"></div>
                    <div>
                        <span class="text-xs text-green-600">{{ $comment->status }}</span>
                        <span class="text-xs font-semibold ml-4">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    @endif
                </div>

                <div>
                    <i wire:click.prevent="edit({{ $comment->id }})" class="fa-solid fa-pen text-green-500 hover:text-green-600 ml-1 text-xs duration-150 ease-in-out cursor-pointer"></i>
                    <i wire:click.prevent="delete({{ $comment->id }})" class="fa-solid fa-trash text-red-500 hover:text-red-600 ml-1 text-xs duration-150 ease-in-out cursor-pointer"></i>
                </div>
            </div>
            <div class="my-2 break-words">{!! $comment->comment !!}</div>
        </div>
        @empty
        <div>
            Il n'y a aucun commentaire pour le moment.
        </div>
        @endforelse
    </div>
</div>