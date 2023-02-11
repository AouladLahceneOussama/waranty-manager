<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div
        class="py-12 bg-[url('https://www.looknbe.com/wp-content/uploads/2021/10/assurance-sante.jpg')] bg-no-repeat bg-cover bg-center bg-fixed">
        <div class="max-w-7xl mx-auto py-4 px-6 lg:px-8 bg-white bg-opacity-60 rounded">

            <div>
                <span class="text-teal-600 text-xl bold ">{{ __('Quelques statistiques') }}</span>
                <div class="bg-gray-300 w-full h-px"></div>
            </div>

            <div class="mt-2 grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
                    <div class="p-4 flex items-start">
                        <div
                            class="p-3 rounded-full text-orange-500 dark:text-orange-100 bg-orange-100 dark:bg-orange-500 mr-4">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Users
                            </p>
                            @foreach ($statistics['users'] as $role => $count)
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                <span class="font-bold">{{ $count }}</span> <span class="text-xs">{{ $role }} </span>    
                            </p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
                    <div class="p-4 flex items-start">
                        <div
                            class="p-3 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M19.521,7.267c-0.144-0.204-0.38-0.328-0.631-0.328h-3.582l-0.272-1.826c-0.055-0.379-0.379-0.656-0.76-0.656H9.802l-0.39-0.891c-0.123-0.279-0.399-0.46-0.704-0.46H1.11c-0.222,0-0.434,0.096-0.58,0.264C0.385,3.537,0.319,3.76,0.349,3.981l1.673,12.243c0,0,0,0,0,0.002v0.004c0.015,0.113,0.06,0.213,0.119,0.303c0.006,0.009,0.006,0.023,0.012,0.033c0.012,0.016,0.033,0.024,0.046,0.04c0.054,0.065,0.114,0.118,0.185,0.161c0.027,0.018,0.051,0.035,0.078,0.048c0.099,0.045,0.206,0.078,0.32,0.078h0.002l0,0h13.03c0.323,0,0.611-0.201,0.722-0.505l3.076-8.416C19.698,7.735,19.663,7.474,19.521,7.267z M8.203,4.644l0.391,0.889c0.123,0.279,0.399,0.461,0.704,0.461h4.315l0.141,0.944H5.859c-0.323,0-0.611,0.201-0.723,0.505l-2.011,5.505L1.992,4.644H8.203z M15.276,15.356H3.882l2.515-6.879H17.79L15.276,15.356z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Dossiers
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200 text-s">
                                {{ $statistics['folders']['COMPLET']?? 0}} <span class="text-xs text-teal-600">
                                    Complets</span> <br>
                                {{ $statistics['folders']['INCOMPLET']?? 0}} <span class="text-xs text-red-500"> Non
                                    complets</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
                    <div class="p-4 flex items-start">
                        <div
                            class="p-3 rounded-full text-blue-500 dark:text-blue-100 bg-blue-100 dark:bg-blue-500 mr-4">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Commentaires
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">

                                {{ $statistics['comments']['INFORMATIVE']?? 0}} <span class="text-xs text-teal-600">
                                    Informatives</span> <br>
                                {{ $statistics['comments']['URGENT']?? 0 }} <span class="text-xs text-red-500">
                                    Urgents</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
                    <div class="p-4 flex items-start">
                        <div
                            class="p-3 rounded-full text-teal-500 dark:text-teal-100 bg-teal-100 dark:bg-teal-500 mr-4">

                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                                <path
                                    d="M18.807,0.337h-3.616v1.808c0,0.475-0.384,0.859-0.859,0.859c-0.474,0-0.859-0.384-0.859-0.859V0.337H6.731v1.808c0,0.475-0.384,0.859-0.859,0.859c-0.474,0-0.859-0.384-0.859-0.859V0.337h-3.82c-0.474,0-0.859,0.384-0.859,0.859v17.61c0,0.477,0.384,0.859,0.859,0.859h17.613c0.474,0,0.859-0.382,0.859-0.859V1.195C19.665,0.721,19.281,0.337,18.807,0.337zM17.948,17.946H2.052V4.528h15.896V17.946z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Rendez-vous
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ $statistics['appointments'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl  mt-2 mx-auto py-4 px-6 lg:px-8 bg-white bg-opacity-60 rounded">
            <div>
                <span class="text-teal-600 text-xl bold ">{{ __('Commentaires') }}</span>
                <div class="bg-gray-300 w-full h-px"></div>
            </div>
            <div class="mt-2 overflow-y-auto" style="height: 400px">
                @forelse($comments as $comment)
                    {{-- <div>This is how to get the folder data</div>
                <div>{!! $comment->comment !!}</div>
                <div>{{ $comment->folder->id }}</div> --}}

                    <div class="bg-white shadow-md rounded-md my-2 py-2 px-4" key="{{ $comment->id }}">
                        <div class="flex justify-between items-center">
                            <div class="flex justify-start items-center space-x-2">
                                @if ($comment->status == 'URGENT')
                                    <div class="w-2 h-2 bg-red-600 rounded-full"></div>
                                    <div>
                                        <span class="text-xs text-red-600">{{ $comment->status }}</span>
                                        <span
                                            class="text-xs font-semibold ml-4">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                @endif
                                @if ($comment->status == 'EN_COURS')
                                    <div class="w-2 h-2 bg-orange-600 rounded-full"></div>
                                    <div>
                                        <span class="text-xs text-orange-600">{{ $comment->status }}</span>
                                        <span
                                            class="text-xs font-semibold ml-4">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                @endif
                                @if ($comment->status == 'INFORMATIVE')
                                    <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                                    <div>
                                        <span class="text-xs text-blue-600">{{ $comment->status }}</span>
                                        <span
                                            class="text-xs font-semibold ml-4">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                @endif
                                @if ($comment->status == 'COMPLET')
                                    <div class="w-2 h-2 bg-green-600 rounded-full"></div>
                                    <div>
                                        <span class="text-xs text-green-600">{{ $comment->status }}</span>
                                        <span
                                            class="text-xs font-semibold ml-4">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                @endif
                            </div>

                            <div>

                                <a class="text-sm text-teal-600" href="folders/edit/{{ $comment->folder->id }}"> voir
                                    le dossier</a>

                            </div>
                        </div>
                        <div class="my-2 break-words">{!! $comment->comment !!}</div>
                    </div>
                @empty
                    <div> Il n'y aaucun commentaire urgent.</div>
                @endforelse

            </div>

        </div>
        <div class="max-w-7xl mt-2 mx-auto py-4 px-6 lg:px-8 bg-white bg-opacity-60 rounded">
            <div>
                <span class="text-teal-600 text-xl bold ">{{ __('Rendez-vous') }}</span>
                <div class="bg-gray-300 w-full h-px"></div>
            </div>

            {{-- @forelse($appointments as $appointment)
                <div>This is how to get the folder data</div>
                <div>{{ $appointment->date }}</div>
                <div>{{ $appointment->name }}</div>
                <div>{{ $appointment->folder->id }}</div>
            @empty
                <div> Il n'y a pas des rendez-vous.</div>
            @endforelse --}}
            <div class="overflow-y-auto mt-2" style="height: 400px">
                @forelse($appointments as $appointment)
                    <div class="flex justify-between items-center bg-white shadow-md rounded-md mb-2 py-2 px-4"
                        key="{{ $appointment->id }}">
                        <div>
                            <span class="text-xs font-semibold mr-4 text-red-500 ">{{ $appointment->date->diffForHumans() }}</span>
                            <br><span class="text-xs ">{{ $appointment->name }}</span>
                        </div>
                        <div>
                            <a class="text-sm text-teal-600" href="folders/edit/{{ $appointment->folder->id }}"> voir
                                le dossier</a>

                        </div>
                    </div>
                @empty
                    <div>
                        Il n'y a aucun rendez-vous.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
