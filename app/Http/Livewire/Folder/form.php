<?php

namespace App\Http\Livewire\Folder;

use App\Models\Folder;
use App\Models\Insured;
use App\Services\FoldersService;
use App\Services\InsuredsService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Form extends Component
{
    use WithPagination;

    public Folder $folder;
    public Insured $primary;
    public Insured $secondary;
    public Insured $children;
    public $insureds = ["children" => []];

    public $nom;


    protected $rules = [
        "folder.compagnie" => "required|string",
        "folder.souscripteur" => "required|string",
        "folder.cotisation_ht" => "required|string",
        "folder.cotisation_ttc" => "required|string",
        "folder.date_effet" => "required|date",
        "folder.numero_adheration" => "required|string",
        "folder.status" => "required|string",
        "insureds.*.nom" => "required|string",
        "insureds.*.nom_jeune_fille" => "required|string",
        "insureds.*.prenom" => "required|string",
        "insureds.*.date_naissance" => "required|string",
        "insureds.*.pays_naissance" => "required|string",
        "insureds.*.departement_naissance" => "required|string",
        "insureds.*.civilite" => "required|string",
        "insureds.*.etat_civil" => "required|string",
        "insureds.*.code_securite_social" => "required|string",
        "insureds.*.primary_phone" => "required|string",
        "insureds.*.secondary_phone" => "required|string",
        "insureds.*.email" => "required|string",
        "insureds.*.iban" => "required|string",
        "insureds.*.jours_prelevement" => "required|string",
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

    public function create()
    {
        //$this->validate();
        $this->folder->user_id = Auth::id();
        $this->folder->save();
        InsuredsService::create($this->insureds, $this->folder->id);
    }

    public function mount()
    {
        $this->folder = new Folder();
        $this->insured = new Insured();
        $this->enfant = new Insured();
    }

    public function render()
    {
        return view('folder.form');
    }
}
