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
            <input type="text" wire:model="role" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="role" id="role" />
            @error('role') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="permissions_input">
                {{ __('Permissions') }}
            </label>
            <select id="select2" class="hidden" multiple>
                @foreach($static_permissions as $key => $value)
                    <option value="{{$key}}" {{ str_contains($permissions, $key) ? "selected" : "" }}>{{$value}}</option>
                @endforeach
            </select>
            @error('permissions') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror

            <div class="w-full relative flex" x-data="{ ...selectMultiple('select2') }">
                <div class="w-full flex flex-wrap border border-gray-300 rounded-md" @click="isOpen = true;" @keydown.arrow-down.prevent="if(dropdown.length > 0) document.getElementById(elSelect.id+'_'+dropdown[0].index).focus();">

                    <template x-for="(option,index) in selected;" :key="option.value">
                        <p class="m-1 self-center p-2 text-xs whitespace-nowrap rounded-md bg-teal-200 cursor-pointer hover:bg-red-300" 
                            x-text="option.text" 
                            @click="toggle(option)">
                        </p>
                    </template>

                    <input type="text" placeholder="permissions" id="permissions_input" autoComplete="off"
                        class="m-1 w-28 pl-2 rounded-md h-8 border border-gray-300" 
                        x-model="term" 
                        x-ref="input" />
                </div>

                <div class="absolute mt-12 z-10 w-full max-h-32 overflow-y-auto rounded-md bg-teal-100" 
                x-show="isOpen"
                @mousedown.away="isOpen = false">

                    <template x-for="(option,index) in dropdown" :key="option.value">
                        <div class="cursor-pointer hover:bg-teal-200 focus:bg-teal-300 focus:outline-none" 
                            :class="(term.length > 0 && !option.text.toLowerCase().includes(term.toLowerCase())) && 'hidden';" 
                            x-init="$el.id = elSelect.id + '_' + option.index; $el.tabIndex = option.index;"
                            @click="toggle(option)" 
                            @keydown.enter.prevent="toggle(option);" 
                            @keydown.arrow-up.prevent="if ($el.previousElementSibling != null) $el.previousElementSibling.focus();" 
                            @keydown.arrow-down.prevent="if ($el.nextElementSibling != null) $el.nextElementSibling.focus();"
                        >
                            <p class="p-2" x-text="option.text"></p>
                        </div>
                    </template>
                </div>
            </div>
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