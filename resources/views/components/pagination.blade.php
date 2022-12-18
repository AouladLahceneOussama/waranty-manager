@if ($paginator->hasPages())
    <div class="flex justify-center items-start my-2">
        
        @if ( ! $paginator->onFirstPage())
            {{-- First Page Link --}}
            <a
            class="mx-1 w-9 h-9 text-sm leading-8 border-2 border-gray-300 text-slate-500 font-bold text-center hover:text-slate-800 hover:border-slate-800 rounded-full cursor-pointer transition duration-300 ease-in-out"
            wire:click="gotoPage(1)"
            >
            <i class="fa-solid fa-backward"></i>
            </a>
            @if($paginator->currentPage() > 2)
            {{-- Previous Page Link --}}
            <a
                class="mx-1 w-9 h-9 text-sm leading-8 border-2 border-gray-300 text-slate-500 font-bold text-center hover:text-slate-800 hover:border-slate-800 rounded-full cursor-pointer transition duration-300 ease-in-out"
                wire:click="previousPage"
            >
            <i class="fa-solid fa-caret-left"></i>
            </a>
            @endif
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <!--  Use three dots when current page is greater than 3.  -->
                    @if ($paginator->currentPage() > 3 && $page === 2)
                        <div class="text-gray-600 mx-1">
                            <span class="font-bold">.</span>
                            <span class="font-bold">.</span>
                            <span class="font-bold">.</span>
                        </div>
                    @endif

                    <!--  Show active page two pages before and after it.  -->
                    @if ($page == $paginator->currentPage())
                        <span class="mx-1 w-9 h-9 text-sm leading-9 bg-indigo-500 text-white font-bold text-center rounded-full">{{ $page }}</span>
                    @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2)
                        <a class="mx-1 w-9 h-9 text-sm leading-8 border-2 border-gray-300 text-slate-400 font-bold text-center hover:text-slate-800 hover:border-slate-800 rounded-full cursor-pointer transition duration-300 ease-in-out" wire:click="gotoPage({{$page}})">{{ $page }}</a>
                    @endif

                    <!--  Use three dots when current page is away from end.  -->
                    @if ($paginator->currentPage() < $paginator->lastPage() - 2  && $page === $paginator->lastPage() - 1)
                        <div class="text-gray-600 mx-1">
                            <span class="font-bold">.</span>
                            <span class="font-bold">.</span>
                            <span class="font-bold">.</span>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            @if($paginator->lastPage() - $paginator->currentPage() >= 2)
                <a class="mx-1 w-9 h-9 text-sm leading-8 border-2 border-gray-300 text-slate-500 font-bold text-center hover:text-slate-800 hover:border-slate-800 rounded-full cursor-pointer transition duration-300 ease-in-out"
                wire:click="nextPage"
                rel="next">
                <i class="fa-solid fa-caret-right"></i>
                </a>
            @endif
            <a
                class="mx-1 w-9 h-9 text-sm leading-8 border-2 border-gray-300 text-slate-500 font-bold text-center hover:text-slate-800 hover:border-slate-800 rounded-full cursor-pointer transition duration-300 ease-in-out"
                wire:click="gotoPage({{ $paginator->lastPage() }})"
            >
            <i class="fa-solid fa-forward"></i>
            </a>
        @endif
    </div>
@endif