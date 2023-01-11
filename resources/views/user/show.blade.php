<div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="mb-4">
            <x-table>
                <x-slot name="title">
                    {{ __('Tableau des utilisateurs') }}
                </x-slot>

                <x-slot name="multiSearch">
                    <input wire:model.lazy="query" type="text" placeholder="Search by email, name, phone, role, stat" class="w-full rounded-l-lg p-0 px-2 py-1 border-gray-300 text-sm">
                    <button class="w-12 bg-teal-600  rounded-r-lg text-white"><i class="fa-brands fa-searchengin"></i></button>
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
                        <th wire:click="sortBy('id')" class="px-6 py-3 w-10 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 hover:opacity-100 cursor-pointer transition ease-in-out duration-300">
                            Id
                            @include('components.sort-icons', ['name' => 'id'])
                        </th>
                        <th wire:click="sortBy('name')" class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 hover:opacity-100 cursor-pointer transition ease-in-out duration-300">
                            Nom
                            @include('components.sort-icons', ['name' => 'name'])
                        </th>
                        <th wire:click="sortBy('email')" class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 hover:opacity-100 cursor-pointer transition ease-in-out duration-300">
                            Email
                            @include('components.sort-icons', ['name' => 'email'])
                        </th>
                        <th wire:click="sortBy('role')" class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 hover:opacity-100 cursor-pointer transition ease-in-out duration-300">
                            Role
                            @include('components.sort-icons', ['name' => 'role'])
                        </th>
                        <th wire:click="sortBy('permissions')" class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 hover:opacity-100 cursor-pointer transition ease-in-out duration-300">
                            Permisions
                            @include('components.sort-icons', ['name' => 'permissions'])
                        </th>
                        <th class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 hover:opacity-100 cursor-pointer transition ease-in-out duration-300">
                            Créé Par
                        </th>
                        <th wire:click="sortBy('created_at')" class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 hover:opacity-100 cursor-pointer transition ease-in-out duration-300">
                            modifié le
                            @include('components.sort-icons', ['name' => 'created_at'])
                        </th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            Actions
                        </th>
                    </tr>
                </x-slot>

                <x-slot name="tbody" class="relative">
                    @forelse($users as $user)
                    <tr class="border-b-2 border-gray-50 last:border-b-0">
                        <td class="w-10 p-2 text-center align-middle whitespace-nowrap">
                            <span wire:loading.remove class="font-semibold leading-tight text-xs text-slate-700">{{ $user->id }}</span>
                            <span wire:loading class="w-10 animate-pulse bg-gray-400 h-3 rounded-full"></span>
                        </td>
                        <td class="p-2 pl-6 text-left align-middle whitespace-nowrap ">
                            <span wire:loading.remove class="font-semibold leading-tight text-xs text-slate-700">{{ $user->name }}</span>
                            <span wire:loading class="w-{{ $skeletonWidths[rand(0, count($skeletonWidths) - 1)] }} animate-pulse bg-gray-400 h-3 rounded-full"></span>
                        </td>
                        <td class="p-2 pl-6 leading-normal text-left align-middle text-size-sm whitespace-nowrap ">
                            <span wire:loading.remove class="font-semibold leading-tight text-xs text-slate-700">{{ $user->email }}</span>
                            <span wire:loading class="w-{{ $skeletonWidths[rand(0, count($skeletonWidths) - 1)] }} animate-pulse bg-gray-400 h-3 rounded-full"></span>
                        </td>
                        <td class="p-2 align-middle whitespace-nowrap">
                            <span wire:loading.remove class="font-semibold leading-tight text-xs text-slate-700">{{ $user->role }}</span>
                            <span wire:loading class="w-{{ $skeletonWidths[rand(0, count($skeletonWidths) - 1)] }} animate-pulse bg-gray-400 h-3 rounded-full"></span>
                        </td>
                        <td class="p-2 text-left align-middle whitespace-nowrap">
                            <span wire:loading.remove class="font-semibold leading-tight text-xs text-slate-700">
                                @foreach(explode(",", $user->permissions) as $p)
                                <span class="px-2 py-1 mx-1 text-xs text-white bg-teal-400 rounded-md">{{ $p }}</span>
                                @endforeach

                            </span>
                            <span wire:loading class="w-{{ $skeletonWidths[rand(0, count($skeletonWidths) - 1)] }} animate-pulse bg-gray-400 h-3 rounded-full"></span>
                        </td>
                        <td class="p-2 text-left align-middle whitespace-nowrap">
                            <span wire:loading.remove class="font-semibold leading-tight text-xs text-slate-700">{{ $user->createdBy ? $user->createdBy->name : '-'}}</span>
                            <span wire:loading class="w-{{ $skeletonWidths[rand(0, count($skeletonWidths) - 1)] }} animate-pulse bg-gray-400 h-3 rounded-full"></span>
                        </td>
                        <td class="p-2 pl-6 text-left align-middle whitespace-nowrap">
                            <span wire:loading.remove class="font-semibold leading-tight text-xs text-slate-700">{{ $user->updated_at->diffForHumans() }}</span>
                            <span wire:loading class="w-{{ $skeletonWidths[rand(0, count($skeletonWidths) - 1)] }} animate-pulse bg-gray-400 h-3 rounded-full"></span>
                        </td>
                        <td class="p-2 pl-6 text-center align-middle whitespace-nowrap">
                            @if($user->createdBy)
                            <span wire:loading.remove>
                                <a href="/users/edit/{{ $user->id }}"><i class="fa-solid fa-pen text-teal-600 p-1 cursor-pointer text-xs"></i>
                                </a><i wire:click.prevent="confirmModal(true, {{ $user->id }})" class="fa-solid fa-trash text-red-500 p-1 cursor-pointer text-xs"></i>
                            </span>
                            <span wire:loading>
                                <i class="animate-pulse fa-solid fa-pen text-gray-400 p-1 cursor-pointer text-xs"></i>
                                <i class="animate-pulse fa-solid fa-trash text-gray-400 p-1 cursor-pointer text-xs"></i>
                            </span>
                            @else
                            <span wire:loading.remove>
                                <i class="fa-solid fa-ban text-gray-600 cursor-pointer text-xs"></i>
                            </span>
                            <span wire:loading>
                                <i class="animate-pulse fa-solid fa-ban text-gray-600 cursor-pointer text-xs"></i>
                            </span>
                            @endif

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-6">
                            <span class="text-gray-400">Il y a pas des utilisateur pour le moment, Commencez par les ajoutees.</span>
                        </td>
                    </tr>
                    @endforelse
                </x-slot>

                <x-slot name="pagination">
                    {{ $users->links('components.pagination') }}
                    <div>
                        <span class="text-xs">Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} out
                            of {{ $users->total() }}</span>
                    </div>
                </x-slot>
            </x-table>

        </div>
    </div>

    @if($confirm_modal)
    <div class="fixed top-0 left-0 flex items-center justify-center w-full h-screen z-50 p-4">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button wire:click="confirmModal(false)" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">La suppression de cet utilisateur, va supprimer tout les dossiers cree par cet utilisateur, Voullez-vous continuer?</h3>
                    <button wire:click="delete" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Oui</button>
                    <button wire:click="confirmModal(false)" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Non, Annuller</button>
                </div>
            </div>
        </div>
    </div>  
    @endif
</div>