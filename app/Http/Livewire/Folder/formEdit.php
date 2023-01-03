<?php

namespace App\Http\Livewire\Folder;

use App\Models\Folder;
use App\Models\Insured;
use App\Services\FoldersService;
use App\Services\InsuredsService;
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
    public Folder $folder;
    public Insured $primary;
    public Insured $secondary;
    public Insured $child;
    public $insureds;

    //ckeckbox And radio :model
    public $checked;
    public $prelevement;
    public $childTotal;

    protected $rules = [
        "folder.compagnie" => "required|string",
        "folder.souscripteur" => "required|string",
        "folder.cotisation_ht" => "required|string",
        "folder.cotisation_ttc" => "required|string",
        "folder.date_effet" => "required|date",
        "folder.numero_adheration" => "required|string",
        "folder.status" => "required|string",
        "*.nom" => "required|string",
        "*.nom_jeune_fille" => "required|string",
        "*.prenom" => "required|string",
        "*.date_naissance" => "required|string",
        "*.pays_naissance" => "required|string",
        "*.departement_naissance" => "required|string",
        "*.civilite" => "required|string",
        "*.etat_civil" => "required|string",
        "*.code_securite_social" => "required|string",
        "*.primary_phone" => "required|string",
        "*.secondary_phone" => "required|string",
        "*.email" => "required|string",
        "*.iban" => "required|string",
        "*.jours_prelevement" => "required|string",

    ];

    public function addToActivatedSection($sectionName)
    {
        array_push($this->activatedSection, $sectionName);
    }


    public function removeFromActivatedSection($sectionName)
    {
        if (($key = array_search($sectionName, $this->activatedSection)) !== false) {
            unset($this->activatedSection[$key]);
        }
    }

    public function addChild()
    {
        $this->insureds['children'][$this->childTotal] = [
            // "folder_id" => $this->folderId,
            "id" => "",
            "nom" => "",
            "prenom" => "",
            "date_naissance" => "",
            "civilite" => "",
            "code_securite_social" => "",
        ];


        $this->addToActivatedSection('editChild' . $this->childTotal);
        $this->childTotal++;
    }

    private function replaceKeys($key)
    {

        $childskey = [];
        foreach ($this->activatedSection as $activated) {
            if (str_contains($activated, "editChild")) {
                array_push($childskey, str_replace("editChild", '',$activated));
            }
        }
       foreach($childskey as $childKey){
        if($childKey>$key){
           $this->activatedSection =  array_replace( $this->activatedSection,
           array_fill_keys(
               array_keys( $this->activatedSection, "editChild".$childKey),
               "editChild".$childKey-1
           )
       );
        }
       }
      
    }
    public function removeChild($key)
    {
        $this->replaceKeys($key);
        InsuredsService::delete($this->insureds['children'][$key]["id"]);
        unset($this->insureds['children'][$key]);
        $this->insureds['children'] = array_values($this->insureds['children']);
        $this->childTotal--;
    }

    public function edit()
    {
        //$this->validate();
        dd($this->insureds);

        // send event to upload new files
        $this->emit("createMediaFolder", $this->folderId);
    }

    public function save($sectionName)
    {
        $key = '';
        if (strpos($sectionName, "editChild") !== false) {
            $key = str_replace('editChild', '', $sectionName);
        }

        $this->removeFromActivatedSection($sectionName);

        switch ($sectionName) {
            case 'editGeneralInfo':
                $this->folder->status =  $this->checked;
                FoldersService::edit($this->folder->getAttributes(), $this->folder->id);
                $this->sendNotification("Dossier", "modifie");
                break;

            case 'editPrimaryAsured':
                $this->insureds["primary"][0]["jour_prelevement"] = $this->prelevement;
                InsuredsService::edit($this->insureds["primary"][0], $this->insureds["primary"][0]["id"]);
                $this->sendNotification("Assure Principale", "modifie");
                break;
            case 'editSecondaryAsured':
                InsuredsService::edit($this->insureds["secondary"][0], $this->insureds["secondary"][0]["id"]);
                $this->sendNotification("Assure Secondaire", "modifie");
                break;

            case 'editChild' . $key:
                //dd($this->insureds["children"][$key]);
                InsuredsService::updateOrCreateChilds($this->insureds["children"], $this->folderId);
                $this->sendNotification("Enfant", "cree ou modifie");
                break;

            default:
                # code...
                break;
        }
    }

    public function cancel($sectionName)
    {
        $key = '';
        if (strpos($sectionName, "editChild") !== false) {
            $key = str_replace('editChild', '', $sectionName);
            try {
                $this->child = FoldersService::get($this->folderId)["insureds"]["children"][$key];
            } catch (\Throwable $th)  {
                $this->removeChild($key);
                return;
            }
     
       
            
        }
        $this->removeFromActivatedSection($sectionName);

        switch ($sectionName) {
            case 'editGeneralInfo':
                $this->folder->setRawAttributes($this->folder->getOriginal());
                $this->checked = $this->folder->status;
                break;

            case 'editPrimaryAsured':
                $this->insureds["primary"][0] = $this->primary->getOriginal();
                $this->prelevement = $this->primary->jour_prelevement;
                break;

            case 'editSecondaryAsured':
                $this->insureds["secondary"][0] = $this->secondary->getOriginal();
                break;

            case 'editChild' . $key:
                $this->insureds["children"][$key] = $this->child->getOriginal();
                break;

            default:
                # code...
                break;
        }
    }

    public function mount()
    {
        // $this->folder = new Folder();
        // $this->insured = new Insured();
        // $this->enfant = new Insured();

        //Folder Data
        $this->folder = FoldersService::get($this->folderId)["folder"];
        $this->checked = $this->folder->status == 'INCOMPLET' ? '' : 'COMPLET';

        //Insureds Data
        $this->insureds = FoldersService::get($this->folderId)["insureds"];
        $this->primary = $this->insureds["primary"][0] ??  new Insured();
        // dd($this->insureds);
        $this->secondary = $this->insureds["secondary"][0] ?? new Insured();

        $this->prelevement = $this->primary->jour_prelevement;
        if (isset($this->insureds['children']))
            $this->childTotal = count($this->insureds['children']) ?? 0;
    }

    public function render()
    {
        return view('folder.form-edit');
    }

    private function sendNotification($target, $action)
    {
        $this->emit('newResponse', [
            'error' => false,
            'redirect' => [
                'ok' => false,
                'url' => '/',
                'msg' => ''
            ],
            'msg' => "$target est bien $action",
            'data' => ""
        ]);
    }
}
