<div class="w-full px-4 bg-teal-50">
    <div class="w-full mx-auto rounded-xl py-5 text-black" x-data="app">
        <div class="border border-gray-300 overflow-hidden rounded-md">
            <div class="w-full flex justify-center items-center border-b border-gray-300 text-xl text-gray-600">
                <button type="button" class="outline-none focus:outline-none border-r border-gray-300 w-full h-10 hover:text-teal-600 active:bg-gray-50" @click="format('bold')">
                    <i class="mdi mdi-format-bold"></i>
                </button>
                <button type="button" class="outline-none focus:outline-none border-r border-gray-300 w-full h-10 hover:text-teal-600 active:bg-gray-50" @click="format('italic')">
                    <i class="mdi mdi-format-italic"></i>
                </button>
                <button type="button" class="outline-none focus:outline-none border-r border-gray-300 w-full h-10 mr-1 hover:text-teal-600 active:bg-gray-50" @click="format('underline')">
                    <i class="mdi mdi-format-underline"></i>
                </button>
                <button type="button" class="outline-none focus:outline-none border-l border-r border-gray-300 w-full h-10 hover:text-teal-600 active:bg-gray-50" @click="format('formatBlock','P')">
                    <i class="mdi mdi-format-paragraph"></i>
                </button>
                <button type="button" class="outline-none focus:outline-none border-r border-gray-300 w-full h-10 hover:text-teal-600 active:bg-gray-50" @click="format('formatBlock','H1')">
                    <i class="mdi mdi-format-header-1"></i>
                </button>
                <button type="button" class="outline-none focus:outline-none border-r border-gray-300 w-full h-10 hover:text-teal-600 active:bg-gray-50" @click="format('formatBlock','H2')">
                    <i class="mdi mdi-format-header-2"></i>
                </button>
                <button type="button" class="outline-none focus:outline-none border-r border-gray-300 w-full h-10 mr-1 hover:text-teal-600 active:bg-gray-50" @click="format('formatBlock','H3')">
                    <i class="mdi mdi-format-header-3"></i>
                </button>
                <button type="button" class="outline-none focus:outline-none border-l border-r border-gray-300 w-full h-10 hover:text-teal-600 active:bg-gray-50" @click="format('insertUnorderedList')">
                    <i class="mdi mdi-format-list-bulleted"></i>
                </button>
                <button type="button" class="outline-none focus:outline-none border-r border-gray-300 w-full h-10 mr-1 hover:text-teal-600 active:bg-gray-50" @click="format('insertOrderedList')">
                    <i class="mdi mdi-format-list-numbered"></i>
                </button>
                <button type="button" class="outline-none focus:outline-none border-l border-r border-gray-300 w-full h-10 hover:text-teal-600 active:bg-gray-50" @click="format('justifyLeft')">
                    <i class="mdi mdi-format-align-left"></i>
                </button>
                <button type="button" class="outline-none focus:outline-none border-r border-gray-300 w-full h-10 hover:text-teal-600 active:bg-gray-50" @click="format('justifyCenter')">
                    <i class="mdi mdi-format-align-center"></i>
                </button>
                <button type="button" class="outline-none focus:outline-none border-r border-gray-300 w-full h-10 hover:text-teal-600 active:bg-gray-50" @click="format('justifyRight')">
                    <i class="mdi mdi-format-align-right"></i>
                </button>
            </div>
            <div class="w-full">
                <iframe x-ref="richTextArea" class="w-full font-sans h-32 bg-white overflow-y-auto" id='richComment'></iframe>
            </div>
        </div>
        @error('comment')
        <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror
        <div class="w-full my-2 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="status">
                {{ __('Status') }}
            </label>
            <select wire:model="status" class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Status" id="status">
                <option value="URGENT">Urgent</option>
                <option value="EN_COURS">En cours</option>
                <option value="COMPLET">Complet</option>
                <option value="INFORMATIVE">Informative</option>
            </select>
            @error('status')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>

        @if(!$updating)
        <button type="button" @click="addComment()" class="mt-2 px-4 py-2 bg-teal-600 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-700 focus:outline-none focus:border-gray-900 disabled:opacity-25 transition">
            {{ __('Commenter') }}
        </button>
        @else
        <div class="flex justify-center items-center mt-2">
            <button type="button" @click="editComment()" class="w-full md:w-1/2 px-4 py-2 bg-teal-600 border rounded-md font-semibold text-xs text-white uppercase hover:bg-teal-700 focus:outline-none focus:border-gray-900 disabled:opacity-25 transition">
                {{ __('Modifier rendez-vous') }}
            </button>
            <button type="button" wire:click.prevent="cancelEdit" class="w-full md:w-1/2 px-4 py-2 bg-red-600 border rounded-md font-semibold text-xs text-white uppercase hover:bg-red-700 focus:outline-none focus:border-gray-900 disabled:opacity-25 transition">
                {{ __('Annuler') }}
            </button>
        </div>
        @endif

    </div>

    <script type="text/javascript">
        document.addEventListener('alpine:init', () => {
            Alpine.data('app', () => ({
                richTextArea: false,

                init() {
                    let el = this.$refs.richTextArea
                    this.richTextArea = el;
                    this.richTextArea.contentDocument.querySelector('head').innerHTML += `
                        <style>
                            body {font-family: Nunito, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";}
                        </style>`;
                    this.richTextArea.contentDocument.designMode = "on";
                },

                format(cmd, param) {
                    this.richTextArea.contentDocument.execCommand(cmd, !1, param || null)
                },

                addComment() {
                    @this.comment = this.richTextArea.contentDocument.body.innerHTML;
                    @this.add()
                    this.richTextArea.contentDocument.body.innerHTML = "";
                },

                editComment() {
                    @this.comment = this.richTextArea.contentDocument.body.innerHTML;
                    @this.edit()
                    this.richTextArea.contentDocument.body.innerHTML = "";
                }
            }))
        })

        window.onload = function() {
            Livewire.on('startCommentEditing', (comment) => {
                document.querySelector("#richComment").contentDocument.body.innerHTML = comment.comment
            })
        }
    </script>
</div>