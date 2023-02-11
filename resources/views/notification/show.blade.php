<div x-data="{ open: false }" @click.away="open = false">

    <button @click="open = true" class="focus:outline-none text-teal-600">
        <i class="fa-solid fa-calendar-check "></i>
    </button>

    <div class="w-96 fixed top-0 right-0 z-10 h-full overflow-x-hidden transform" 
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-x-0"
        x-transition:enter-end="opacity-100 translate-x-full"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-x-full"
        x-transition:leave-end="opacity-0 translate-x-0"
    >
        <div class="w-full relative bg-gray-50 h-screen overflow-y-auto p-8">
            <div class="flex items-center justify-between">
                <p tabindex="0" class="focus:outline-none text-2xl font-semibold leading-6 text-gray-800">Notifications</p>
                <button @click="open = false" role="button" aria-label="close modal" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 rounded-md cursor-pointer" onclick="notificationHandler(false)">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6 6L18 18" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            @foreach ($notifications as $notification)
            <div class="w-full p-3 mt-8 bg-white rounded flex">
                <div class="pl-3">
                    <p tabindex="0" class="focus:outline-none text-sm leading-none">Prochain rendez-vous <span class="text-indigo-700">{{ $notification->name }}</span> sera <span class="text-indigo-700">{{ $notification->date->diffForHumans() }}</span></p>
                    <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-3 text-gray-500">{{ $notification->created_at->diffForHumans() }}</p>
                    <a class="text-xs pt-0 mt-0" href="/folders/edit/{{ $notification->folder_id }}">Voir le dossier</a>
                </div>
            </div>
            @endforeach

            <div class="flex items-center justify-between">
                <hr class="w-full">
                <p tabindex="0" class="focus:outline-none text-sm flex flex-shrink-0 leading-normal px-3 py-16 text-gray-500">Thats it for now :)</p>
                <hr class="w-full">
            </div>
        </div>
    </div>
</div>