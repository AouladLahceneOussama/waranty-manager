<div>
    <div class="flex items-center justify-center bg-white mb-5 shadow-xl sm:rounded-lg p-6">
        <div class="mx-auto w-full">
            <div class="-mx-3 my-2 flex flex-wrap">
                <div class="w-full px-0 sm:px-3 py-2 sm:py-0 sm:w-1/4">
                    <label for="Compagnie" class="mb-1 block text-xs font-medium">
                        Compagnie
                    </label>
                    <input wire:model.defer="filters.compagnie" type="text" id="Compagnie" placeholder="Nom de compagnie"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" />
                    @error('filters.compagnie')
                        <span class="text-xs text-red-500 py-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full px-0 sm:px-3 py-2 sm:py-0 sm:w-1/4">
                    <label for="numero_adheration" class="mb-1 block text-xs font-medium">
                        Numero D'adheration
                    </label>
                    <input type="text" wire:model.defer="filters.numero_adheration" id="numero_adheration"
                        placeholder="Numero ou Code d'adheration"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" />
                    @error('filters.numero_adheration')
                        <span class="text-xs text-red-500 py-1">{{ $message }}</span>
                    @enderror

                </div>

                <div class="w-full px-0 sm:px-3 py-2 sm:py-0 sm:w-1/4">
                    <label for="phone" class="mb-1 block text-xs font-medium">
                        Telephone
                    </label>
                    <input type="text" wire:model.defer="filters.phone" id="phone"
                        placeholder="Numero telephone de client"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" />
                    @error('filters.phone')
                        <span class="text-xs text-red-500 py-1">{{ $message }}</span>
                    @enderror

                </div>

                <div class="w-full px-0 sm:px-3 py-2 sm:py-0 sm:w-1/4">
                    <label for="email" class="mb-1 block text-xs font-medium">
                        Email
                    </label>
                    <input type="email" wire:model.defer="filters.email" id="email" placeholder="Email de client"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" />
                    @error('filters.email')
                        <span class="text-xs text-red-500 py-1">{{ $message }}</span>
                    @enderror

                </div>

            </div>

            <div>
                <label for="guest" class="mb-1 block text-xs font-medium">
                    Date effet
                </label>
            </div>

            <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-0 sm:px-3 py-2 sm:py-0 sm:w-3/4">
                    <div class="flex justify-center items-center space-x-2">
                        <div class="w-full">
                            <input type="date" wire:model.defer="filters.date_effet_start" id="date_effet_start"
                                class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" />
                            @error('filters.date_effet_start')
                                <span class="text-xs text-red-500 py-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <span class="text-xs">à</span>
                        <div class="w-full">
                            <input type="date" wire:model.defer="filters.date_effet_end" id="date_effet_end"
                                class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" />
                            @error('filters.date_effet_end')
                                <span class="text-xs text-red-500 py-1">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="w-full px-0 sm:px-3 py-2 sm:py-0 flex justify-center items-strech sm:w-1/4 space-x-2">
                    <button type="button" wire:click="applyFilter"
                        class="w-1/2 py-2 rounded-md bg-teal-600  hover:bg-teal-700 text-center text-xs font-semibold text-white outline-none hover:shadow-form">
                        Appliquer
                    </button>
                    <button type="button" wire:click="resetFilter"
                        class="w-1/2 py-2 rounded-md bg-gray-400 hover:bg-gray-500 text-center text-xs font-semibold text-white outline-none hover:shadow-form">
                        Réinitialiser
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="mb-4">
            <x-table>
                <x-slot name="title">
                    {{ __('Tableau des dossiers') }}
                </x-slot>

                <x-slot name="multiSearch">
                    <input wire:model.lazy="query" type="text"
                        placeholder="Search by email, name, phone, role, stat"
                        class="w-full rounded-l-lg p-0 px-2 py-1 border-gray-300 text-sm">
                    <button class="w-12 bg-teal-600  rounded-r-lg text-white"><i
                            class="fa-brands fa-searchengin"></i></button>
                </x-slot>

                <x-slot name="recordSize">
                    <select wire:model="limit" class="w-full rounded-lg px-2 py-2 border-gray-300 text-sm">
                        <option value="20" selected>20</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                    </select>
                </x-slot>

                <x-slot name="thead">
                    <tr>
                        <th wire:click="sortBy('id')"
                            class="px-6 py-3 w-10 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 hover:opacity-100 cursor-pointer transition ease-in-out duration-300">
                            Id
                            @include('components.sort-icons', ['name' => 'id'])
                        </th>
                        <th wire:click="sortBy('compagnie')"
                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 hover:opacity-100 cursor-pointer transition ease-in-out duration-300">
                            Compagnie
                            @include('components.sort-icons', ['name' => 'compagnie'])
                        </th>
                        <th wire:click="sortBy('souscripteur')"
                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 hover:opacity-100 cursor-pointer transition ease-in-out duration-300">
                            Souscripteur
                            @include('components.sort-icons', ['name' => 'souscripteur'])
                        </th>
                        <th wire:click="sortBy('date_effet')"
                            class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 hover:opacity-100 cursor-pointer transition ease-in-out duration-300">
                            Date effet
                            @include('components.sort-icons', ['name' => 'date_effet'])
                        </th>
                        <th wi-re:click="sortBy('cotisation_ht')"
                            class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 hover:opacity-100 cursor-pointer transition ease-in-out duration-300">
                            Cotisation
                            @include('components.sort-icons', ['name' => 'cotisation_ht'])
                        </th>
                        <th wire:click="sortBy('user_id')"
                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 hover:opacity-100 cursor-pointer transition ease-in-out duration-300">
                            Ajoute par
                            @include('components.sort-icons', ['name' => 'user_id'])
                        </th>
                        <th wire:click="sortBy('created_at')"
                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 hover:opacity-100 cursor-pointer transition ease-in-out duration-300">
                            Ajoute le
                            @include('components.sort-icons', ['name' => 'created_at'])
                        </th>
                        <th
                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            Actions
                        </th>
                    </tr>
                </x-slot>

                <x-slot name="tbody" class="relative">
                    @forelse($folders as $folder)
                        <tr class="border-b-2 border-gray-50 last:border-b-0">
                            <td class="w-10 p-2 text-center align-middle whitespace-nowrap">
                                <span wire:loading.remove
                                    class="font-semibold leading-tight text-xs text-slate-700">{{ $folder->id }}</span>
                                <span wire:loading class="w-10 animate-pulse bg-gray-400 h-3 rounded-full"></span>
                            </td>
                            <td class="p-2 pl-6 text-left align-middle whitespace-nowrap ">
                                <span wire:loading.remove
                                    class="font-semibold leading-tight text-xs text-slate-700">{{ $folder->compagnie }}</span>
                                <span wire:loading
                                    class="w-{{ $skeletonWidths[rand(0, count($skeletonWidths) - 1)] }} animate-pulse bg-gray-400 h-3 rounded-full"></span>
                            </td>
                            <td class="p-2 pl-6 leading-normal text-left align-middle text-size-sm whitespace-nowrap ">
                                <span wire:loading.remove
                                    class="font-semibold leading-tight text-xs text-slate-700">{{ $folder->souscripteur }}</span>
                                <span wire:loading
                                    class="w-{{ $skeletonWidths[rand(0, count($skeletonWidths) - 1)] }} animate-pulse bg-gray-400 h-3 rounded-full"></span>
                            </td>
                            <td class="p-2 align-middle whitespace-nowrap">
                                <span wire:loading.remove
                                    class="font-semibold leading-tight text-xs text-slate-700">{{ $folder->date_effet }}</span>
                                <span wire:loading
                                    class="w-{{ $skeletonWidths[rand(0, count($skeletonWidths) - 1)] }} animate-pulse bg-gray-400 h-3 rounded-full"></span>
                            </td>
                            <td class="p-2 text-left align-middle whitespace-nowrap ">
                                <p wire:loading.remove class="font-semibold leading-tight text-xs text-slate-700">
                                    {{ $folder->cotisation_ht }}<strong class="font-bold text-slate-900"> HT</strong>
                                </p>
                                <p wire:loading.remove class="font-semibold leading-tight text-xs text-slate-700">
                                    {{ $folder->cotisation_ttc }}<strong class="font-bold text-slate-900">
                                        TTC</strong></p>
                                <p wire:loading
                                    class="w-{{ $skeletonWidths[rand(0, count($skeletonWidths) - 1)] }} animate-pulse bg-gray-400 h-3 rounded-full">
                                </p>
                            </td>
                            <td class="p-2 pl-6 text-left align-middle whitespace-nowrap">
                                <span wire:loading.remove
                                    class="font-semibold leading-tight text-xs text-slate-700">{{ $folder->user->name }}</span>
                                <span wire:loading
                                    class="w-{{ $skeletonWidths[rand(0, count($skeletonWidths) - 1)] }} animate-pulse bg-gray-400 h-3 rounded-full"></span>
                            </td>
                            <td class="p-2 pl-6 text-left align-middle whitespace-nowrap">
                                <span wire:loading.remove
                                    class="font-semibold leading-tight text-xs text-slate-700">{{ $folder->created_at->diffForHumans() }}</span>
                                <span wire:loading
                                    class="w-{{ $skeletonWidths[rand(0, count($skeletonWidths) - 1)] }} animate-pulse bg-gray-400 h-3 rounded-full"></span>
                            </td>
                            <td class="p-2 pl-6 text-left align-middle whitespace-nowrap">
                                <span wire:loading.remove>
                                    <a href="/folders/edit/{{ $folder->id }}"><i
                                            class="fa-solid fa-pen text-teal-600 p-1 cursor-pointer text-xs"></i>
                                    </a><i wire:click.prevent="delete({{ $folder->id }})"
                                        class="fa-solid fa-trash text-red-500 p-1 cursor-pointer text-xs"></i>
                                </span>
                                <span wire:loading>
                                    <i
                                        class="animate-pulse fa-solid fa-pen text-gray-400 p-1 cursor-pointer text-xs"></i>
                                    <i
                                        class="animate-pulse fa-solid fa-trash text-gray-400 p-1 cursor-pointer text-xs"></i>
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-left py-6">
                                <span class="text-gray-400">Il y a pas des dossiers pour le moment, commencez par la
                                    creation d'un nouveua dossier.</span>
                            </td>
                        </tr>
                    @endforelse
                </x-slot>

                <x-slot name="pagination">
                    {{ $folders->links('components.pagination') }}
                    <div>
                        <span class="text-xs">Showing {{ $folders->firstItem() }} to {{ $folders->lastItem() }} out
                            of {{ $folders->total() }}</span>
                    </div>
                </x-slot>
            </x-table>

        </div>
    </div>
</div>
