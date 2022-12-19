<div>
    <form class="w-full py-2 px-8 mt-4 h-full">

        {{-- information generale --}}
        <div class="w-full p-4 mb-4 bg-teal-50 rounded">

            <div class="w-full mb-3">
                <span class="text-teal-600 text-xl ">{{ __('Informations générales') }}</span>
                <div class="bg-gray-200 w-full h-px"></div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-4">

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="compagnie">
                        {{ __('Compagnie') }}
                    </label>
                    <input wire:model="folder.compagnie" type="text"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Compagnie" id="compagnie" />
                    @error('folder.compagnie')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                        for="souscripteur">
                        {{ __('Souscripteur') }}
                    </label>
                    <input wire:model="folder.souscripteur" type="text"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Souscripteur" id="souscripteur" />
                    @error('folder.souscripteur')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="flex flex-wrap -mx-3 mb-4">

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                        for="cotisation_ht">
                        {{ __('Cotisation HT') }}
                    </label>
                    <input wire:model="folder.cotisation_ht" type="number"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Cotisation en HT" id="cotisation_ht" />
                    @error('folder.cotisation_ht')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                        for="cotisation_ttc">
                        {{ __('Cotisation TTC') }}
                    </label>
                    <input wire:model="folder.cotisation_ttc" type="number"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Cotisation en TTC" id="cotisation_ttc" />
                    @error('folder.cotisation_ttc')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="flex flex-wrap -mx-3 mb-4">

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="date_effet">
                        {{ __('Date d\'effet') }}
                    </label>
                    <input wire:model="folder.date_effet" type="date"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Cotisation en HT" id="date_effet" />
                    @error('folder.date_effet')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full  md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="statut">
                        {{ __('Status') }}
                    </label>
                    <div class="flex  items-center">
                        <label class="inline-flex relative items-center cursor-pointer">
                            <input wire:model="folder.statut" type="checkbox" value="" class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-teal-600">
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-700 ">Dossier
                                Complet</span>
                        </label>


                        @error('folder.statut')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        {{--  assuré principal --}}
        <div class="w-full p-4 mb-4 bg-teal-50 rounded">

            <div class="w-full mb-3">
                <div class="flex justify-between items-center">
                    <span class="text-teal-600 text-xl ">{{ __('Informations de l\'assuré principal') }}</span>
                </div>
                <div class="bg-gray-200 w-full h-px"></div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-4">

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="nom">
                        {{ __('Nom de famille') }}
                    </label>
                    <input wire:model="insureds.primary.nom" type="text"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Nom de l'assuré" id="nom" />
                    @error('nom')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="nom_jf">
                        {{ __('Nom de jeune fille') }}
                    </label>
                    <input wire:model="insureds.primary.nom_jeune_fille" type="text"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Nom_jf de l'assuré" id="nom_jf" />
                    @error('nom_jeune_fille')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="prenom">
                        {{ __('Prénom') }}
                    </label>
                    <input wire:model="insureds.primary.prenom" type="text"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Prénom de l'assuré" id="prenom" />
                    @error('prenom')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                        for="date_naissance">
                        {{ __('Date de naissance') }}
                    </label>
                    <input wire:model="insureds.primary.date_naissance" type="date"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Date de naissance" id="date_naissance" />
                    @error('date_naissance')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                        for="pays_naissance">
                        {{ __('Pays de naissance') }}
                    </label>
                    <input wire:model="insureds.primary.pays_naissance" type="text"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Pays de naissance" id="pays_naissance" />
                    @error('pays_naissance')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>



                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                        for="departement_naissance">
                        {{ __('Département de naissance') }}
                    </label>
                    <input wire:model="insureds.primary.departement_naissance" type="text"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Département de naissance" id="departement_naissance" />
                    @error('departement_naissance')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="civilite">
                        {{ __('Civilité') }}
                    </label>
                    <select wire:model="insureds.primary.civilite"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Date de naissance" id="civilite">
                        <Option>M.</Option>
                        <Option>Mme</Option>
                        <Option>Mlle</Option>
                    </select>
                    @error('civilite')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                        for="etat_civil">
                        {{ __('Etat civil') }}
                    </label>
                    <select wire:model="insureds.primary.etat_civil"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Etat civil" id="etat_civil">
                        <Option>célibataire</Option>
                        <Option>marié(e)</Option>
                        <Option>cohabitant(e)</Option>
                    </select>
                    @error('etat_civil')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>



                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                        for="code_securite_social">
                        {{ __('Code securité social') }}
                    </label>
                    <input wire:model="insureds.primary.code_securite_social" type="text"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Code securité social" id="code_securite_social" />
                    @error('code_securite_social')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="flex flex-wrap -mx-3 mb-4">

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                        for="primary_phone">
                        {{ __('Numero Telephone primaire') }}
                    </label>
                    <input wire:model="insureds.primary.primary_phone" type="tel"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Numero telephone primaire" id="primary_phone" />
                    @error('primary_phone')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                        for="secondary_phone">
                        {{ __('Numero Telephone secondaire') }}
                    </label>
                    <input wire:model="insureds.primary.secondary_phone" type="tel"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="Numero telephone secondaire" id="secondary_phone" />
                    @error('secondary_phone')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="email">
                        {{ __('Email') }}
                    </label>
                    <input wire:model="insureds.primary.email" type="email"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="jhon.doe@gmail.com" id="email" />
                    @error('email')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="flex flex-wrap -mx-3 mb-4">

                <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="iban">
                        {{ __('IBAN') }}
                    </label>
                    <input wire:model="insureds.primary.iban" type="text"
                        class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                        placeholder="IBAN" id="iban" />
                    @error('iban')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                        for="jour_prelevement">
                        {{ __('Jour de prélèvement') }}
                    </label>
                    <div class="flex items-center">
                        <input wire:model="insureds.primary.jours_prelevement" id="disabled-radio-2" type="radio"
                            value="5" name="disabled-radio"
                            class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2">
                        <label for="disabled-radio-2" class="mx-2 text-sm font-medium text-gray-700 ">5</label>

                        <input wire:model="insureds.primary.jours_prelevement"id="disabled-radio-2" type="radio"
                            value="10" name="disabled-radio"
                            class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2">
                        <label for="disabled-radio-2" class="mx-2 text-sm font-medium text-gray-700 ">10</label>

                        <input wire:model="insureds.primary.jours_prelevement" id="disabled-radio-2" type="radio"
                            value="15" name="disabled-radio"
                            class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2">
                        <label for="disabled-radio-2" class="mx-2 text-sm font-medium text-gray-700 ">15</label>
                    </div>
                    @error('jours_prelevement')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        {{-- assuré secondaire --}}
        <div class="w-full p-4 mb-4 bg-teal-50 rounded">
            <div class="w-full mb-3">
                <div class="flex justify-between items-center">
                    <span class="text-teal-600 text-xl ">{{ __('Informations de l\'assuré secondaire') }}</span>

                </div>
                <div class="bg-gray-200 w-full h-px"></div>
            </div>
            <div class="w-full">

                <div class="flex flex-wrap -mx-3 mb-4">

                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                            for="nom">
                            {{ __('Nom de famille') }}
                        </label>
                        <input wire:model="insureds.secondary.nom" type="text"
                            class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                            placeholder="Nom de l'assuré" id="nom" />
                        @error('nom')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                            for="prenom">
                            {{ __('Prénom') }}
                        </label>
                        <input wire:model="insureds.secondary.prenom" type="text"
                            class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                            placeholder="Prénom de l'assuré" id="prenom" />
                        @error('prenom')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                            for="date_naissance">
                            {{ __('Date de naissance') }}
                        </label>
                        <input wire:model="insureds.secondary.date_naissance" type="date"
                            class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                            placeholder="Date de naissance" id="date_naissance" />
                        @error('date_naissance')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                            for="civilite">
                            {{ __('Civilité') }}
                        </label>
                        <select wire:model="insureds.secondary.civilite"
                            class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                            placeholder="Date de naissance" id="civilite">
                            <Option>M.</Option>
                            <Option>Mme</Option>
                            <Option>Mlle</Option>
                        </select>
                        @error('civilite')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                            for="code_securite_social">
                            {{ __('Code securité social') }}
                        </label>
                        <input wire:model="insureds.secondary.code_securite_social" type="text"
                            class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                            placeholder="Code securité social" id="code_securite_social" />
                        @error('code_securite_social')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>




                </div>
            </div>
        </div>
        {{-- Enfants --}}
        <div class="w-full p-4 mb-4 bg-teal-50 rounded">
            <div class="w-full">
                <div class="flex justify-between items-center">
                    <span class="text-teal-600 text-xl ">{{ __('Enfants') }}</span>

                </div>
                <div class="bg-gray-300 my-2 w-full h-px"></div>
            </div>

            @foreach ($insureds['children'] as $key => $value)
                <div wire:key="{{ $key }}" class="w-full bg-white bg-opacity-70 p-2 my-2 rounded">
                    <div class="w-full mb-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400 text-xs ">{{ __('Enfant') . ' N°' . $key + 1 }}</span>
                            <button wire:click.prevent="removeChild({{ $key }})"
                                class="mb-2 px-8 py-2 bg-red-500 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 focus:outline-none focus:border-gray-900 disabled:opacity-25 transition">
                                {{ __('Supprimer l\'enfant') }}
                            </button>
                        </div>
                        <div class="bg-gray-200 w-full h-px"></div>
                    </div>
                    <div class="w-full">

                        <div class="flex flex-wrap -mx-3 mb-4">

                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                                    for="nom_enf_{{ $key }}">
                                    {{ __('Nom de famille') }}
                                </label>
                                <input wire:model="insureds.children.{{ $key }}.nom" type="text"
                                    class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                                    placeholder="Nom de l'assuré" id="nom_enf_{{ $key }}" />
                                @error('nom_enf_{{ $key }}')
                                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                                    for="prenom_enf_{{ $key }}">
                                    {{ __('Prénom') }}
                                </label>
                                <input wire:model="insureds.children.{{ $key }}.prenom" type="text"
                                    class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                                    placeholder="Prénom de l'assuré" id="prenom_enf_{{ $key }}" />
                                @error('prenom_enf_{{ $key }}')
                                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                                    for="date_naissance__enf_{{ $key }}">
                                    {{ __('Date de naissance') }}
                                </label>
                                <input wire:model="insureds.children.{{ $key }}.date_naissance"
                                    type="date"
                                    class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                                    placeholder="Date de naissance" id="date_naissance__enf_{{ $key }}" />
                                @error('date_naissance__enf_{{ $key }}')
                                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                                    for="civilite_enf_{{ $key }}">
                                    {{ __('Civilité') }}
                                </label>
                                <select wire:model="insureds.children.{{ $key }}.civilite"
                                    class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                                    placeholder="Date de naissance" id="civilite_enf_{{ $key }}">
                                    <Option>M.</Option>
                                    <Option>Mme</Option>
                                    <Option>Mlle</Option>
                                </select>
                                @error('civilite_enf_{{ $key }}')
                                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1"
                                    for="code_securite_social_enf_{{ $key }}">
                                    {{ __('Code securité social') }}
                                </label>
                                <input wire:model="insureds.children.{{ $key }}.code_securite_social"
                                    type="text"
                                    class="text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow"
                                    placeholder="Code securité social"
                                    id="code_securite_social_enf_{{ $key }}" />
                                @error('code_securite_social_enf_{{ $key }}')
                                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                @enderror
                            </div>




                        </div>
                    </div>
                </div>
            @endforeach
            <button wire:click.prevent="addChild"
                class="mb-2 px-4 py-2 bg-teal-600 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-600 focus:outline-none focus:border-gray-900 disabled:opacity-25 transition">
                {{ __('Ajouter un enfant') }}
            </button>
        </div>

        {{-- Documments --}}
        <div class="w-full p-4 mb-4 bg-teal-50 rounded">
            <div class="w-full">
                <div class="flex justify-between items-center">
                    <span class="text-teal-600 text-xl ">{{ __('Les fichiers attachés ') }}</span>

                </div>
                <div class="bg-gray-300 my-2 w-full h-px"></div>
            </div>
{{-- 
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none "
                id="multiple_files" type="file" multiple> --}}

            {{-- <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile" multiple> --}}
      
            <label class="block">
                <input type="file"
                  class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-teal-600 file:text-white hover:file:bg-teal-700" multiple />
              </label>

              {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<style>
@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
/**
 * tailwind.config.js
 * module.exports = {
 *   variants: {
 *     extend: {
 *       backgroundColor: ['active'],
 *     }
 *   },
 * }
 */
.active\:bg-gray-50:active {
    --tw-bg-opacity:1;
    background-color: rgba(249,250,251,var(--tw-bg-opacity));
}
</style>

<div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 py-5">
    <div class="w-full max-w-6xl mx-auto rounded-xl bg-white shadow-lg p-5 text-black" x-data="app()" x-init="init($refs.wysiwyg)">
        <div class="border border-gray-200 overflow-hidden rounded-md">
            <div class="w-full flex border-b border-gray-200 text-xl text-gray-600">
                <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('bold')">
                    <i class="mdi mdi-format-bold"></i>
                </button>
                <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('italic')">
                    <i class="mdi mdi-format-italic"></i>
                </button>
                <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 mr-1 hover:text-indigo-500 active:bg-gray-50" @click="format('underline')">
                    <i class="mdi mdi-format-underline"></i>
                </button>
                <button class="outline-none focus:outline-none border-l border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','P')">
                    <i class="mdi mdi-format-paragraph"></i>
                </button>
                <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','H1')">
                    <i class="mdi mdi-format-header-1"></i>
                </button>
                <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','H2')">
                    <i class="mdi mdi-format-header-2"></i>
                </button>
                <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 mr-1 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','H3')">
                    <i class="mdi mdi-format-header-3"></i>
                </button>
                <button class="outline-none focus:outline-none border-l border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('insertUnorderedList')">
                    <i class="mdi mdi-format-list-bulleted"></i>
                </button>
                <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 mr-1 hover:text-indigo-500 active:bg-gray-50" @click="format('insertOrderedList')">
                    <i class="mdi mdi-format-list-numbered"></i>
                </button>
                <button class="outline-none focus:outline-none border-l border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('justifyLeft')">
                    <i class="mdi mdi-format-align-left"></i>
                </button>
                <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('justifyCenter')">
                    <i class="mdi mdi-format-align-center"></i>
                </button>
                <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('justifyRight')">
                    <i class="mdi mdi-format-align-right"></i>
                </button>
            </div>
            <div class="w-full">
                <iframe x-ref="wysiwyg" class="w-full h-96 overflow-y-auto"></iframe>
            </div>
        </div>
    </div>
</div>

<script>
function app() {
    return {
        wysiwyg: null,
        init: function(el) {
            // Get el
            this.wysiwyg = el;
            // Add CSS
            this.wysiwyg.contentDocument.querySelector('head').innerHTML += `<style>
            *, ::after, ::before {box-sizing: border-box;}
            :root {tab-size: 4;}
            html {line-height: 1.15;text-size-adjust: 100%;}
            body {margin: 0px; padding: 1rem 0.5rem;}
            body {font-family: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";}
            </style>`;
            this.wysiwyg.contentDocument.body.innerHTML += `
            <h1>Hello World!</h1>
            <p>Welcome to the pure AlpineJS and Tailwind WYSIWYG.</p>
            `;
            // Make editable
            this.wysiwyg.contentDocument.designMode = "on";
        },
        format: function(cmd, param) {
            this.wysiwyg.contentDocument.execCommand(cmd, !1, param||null)
        }
    }
}
</script> --}}


        </div>

    </form>

    <button wire:click.prevent="create"
        class="px-8 py-2 bg-teal-600 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-600 focus:outline-none focus:border-gray-900 disabled:opacity-25 transition">
        {{ __('Enregistrer') }}
    </button>
</div>
