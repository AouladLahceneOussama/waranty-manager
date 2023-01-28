<div class="mb-4 w-full py-2 px-8 mt-4 h-full overflow-y-auto">
    <div class="w-full mb-10">
        <span class="text-teal-600 text-xs ">{{ __('Informations personnelles')}}</span>
        <div class="bg-teal-600 w-full h-px"></div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-4">

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="name">
                {{ __('Name') }}
            </label>
            <input type="text" wire:model="name" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Name" id="name" />
            @error('name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="email">
                {{ __('email') }}
            </label>
            <input type="email" wire:model="email" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Email" id="email" />
            @error('email') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-4">

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="role">
                {{ __('Role') }}
            </label>
            <select wire:model="role" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" id="role">
                <option value="1" selected>ADMIN</option>
                <option value="2">VIEWER</option>
                <option value="3">EDITOR</option>
            </select>
            @error('role') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-4">

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="password">
                {{ __('Password') }}
            </label>
            <input type="password" wire:model="password" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Password" id="password" />
            @error('password') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="confirm_password">
                {{ __('Confirm Password') }}
            </label>
            <input type="password" wire:model="password_confirmation" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Confirm Password" id="confirm_password" />
            @error('password_confirmation') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>

    </div>

    <div class="w-full mb-3 mt-10">
        <div class="flex justify-end items-center">
            @if($action == "Ajouter")
            <button wire:click="add" class="px-8 py-2 bg-teal-600 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-600 focus:outline-none focus:border-gray-900 disabled:opacity-25 transition">{{ __('Ajouter')}}</button>
            @else
            <button wire:click="edit" class="px-8 py-2 bg-teal-600 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-600 focus:outline-none focus:border-gray-900 disabled:opacity-25 transition">{{ __('Modifier')}}</button>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('selectMultiple', (elSelectId) => ({

                elSelect: document.getElementById(elSelectId),
                isOpen: false,
                term: '',

                selected: [],
                dropdown: [],

                // in the <select> element, set the attributes :
                //  "multiple" to avoid to Always set "selected" to the first item
                //  class="hidden" (better than hide it with javascript which has a slow reaction)
                init() {
                    for (var index = 0; index < this.elSelect.options.length; index++) {
                        if (this.elSelect.options[index].selected)
                            this.selected.push(this.elSelect.options[index]);
                        else
                            this.dropdown.push(this.elSelect.options[index]);
                    }
                },

                toggle(option) {
                    var property1 = (option.selected == true) ? 'dropdown' : 'selected';
                    var property2 = (option.selected == true) ? 'selected' : 'dropdown';

                    option.selected = !option.selected;

                    // add
                    this[property1].push(option);

                    // remove
                    this[property2] = this[property2].filter((opt, index) => {
                        return opt.value != option.value;
                    });

                    console.log(property1, property2, option.value, this.selected)

                    // reorder this.dropdown to their original select.options indexes
                    if (property1 == 'dropdown')
                        this.dropdown.sort((opt1, opt2) => (opt1.index > opt2.index) ? 1 : -1)

                    // after adding, re-focus the input
                    if (option.selected)
                        this.$refs.input.focus();

                    // save the values in Livewire model
                    let permissions = "";
                    this.selected.forEach( (item, index) => {
                        permissions += item.value;
                        if(this.selected.length != index+1) permissions += ",";
                    });

                    @this.permissions = permissions
                },
            }))
        });
    </script>
</div>