<?php

namespace App\Http\Livewire\Folder;

use App\Models\Folder;
use App\Models\Insured;
use App\Services\FoldersService;
use Livewire\Component;
use Livewire\WithPagination;

class FormEdit extends Component
{
    use WithPagination;

    public $folderId;
    //booleans to show and hide save/cancel buttons
    public $activatedSection = [];

    // data  validation vars   
    public FoldersService $folderService; 
    public Folder $folder ;
    public Insured $primary;
    public Insured $secondary;
    public Insured $children;
    public $insureds =["children" => ['','','']];

    public $checked;
    



    public function addToActivatedSection($sectionName){
        array_push( $this->activatedSection,$sectionName);
    }
    

    public function removeFromActivatedSection($sectionName){
        if (($key = array_search($sectionName, $this->activatedSection)) !== false) {
            unset($this->activatedSection[$key]);
        }
    }

   
    
    protected $rules = [
        "folder.compagnie" => "required|string",
        "folder.souscripteur" => "required|string",
        "folder.cotisation_ht" => "required|string",
        "folder.cotisation_ttc" => "required|string",
        "folder.date_effet" => "required|date",
        "folder.statut" => "required|string",
        "insureds.*.nom" =>"required|string",
        "insureds.*.nom_jeune_fille" =>"required|string",
        "insureds.*.prenom" =>"required|string",
        "insureds.*.date_naissance" =>"required|string",
        "insureds.*.pays_naissance" =>"required|string",
        "insureds.*.departement_naissance" =>"required|string",
        "insureds.*.civilite" =>"required|string",
        "insureds.*.etat_civil" =>"required|string",
        "insureds.*.code_securite_social" =>"required|string",
        "insureds.*.primary_phone" =>"required|string",
        "insureds.*.secondary_phone" =>"required|string",
        "insureds.*.email" =>"required|string",
        "insureds.*.iban" =>"required|string",
        "insureds.*.jours_prelevement" =>"required|string",
      
    ];

    public function addChild()
    {
        $this->insureds['children'][] = [
            "nom" => "",
            "prenom" => "",
            "date_naissance" => "",
            "civilite" => "",
            "code_securite_social" => "",
        ];
    }
    public function removeChild($key)
    {
        unset($this->insureds['children'][$key]);
        $this->insureds['children'] = array_values($this->insureds['children']);
    }


    public function create(){
        //$this->validate();
        dd($this->insureds);
    }

    public function cancel(){
        $this->removeFromActivatedSection('editGeneralInfo');
        $this->folder->setRawAttributes($this->folder->getOriginal());
        $this->checked=$this->folder->status;

    }

    public function mount()
    {
       
        
        $this->folder = new Folder();
        $this->insured = new Insured();
        $this->enfant = new Insured();

        $this->folder = FoldersService::get($this->folderId);
        $this->checked=$this->folder->status;

        $this->editGeneralInfo=false;
    }

    public function render()
    {
       
        return view('folder.form-edit');
    }
}
