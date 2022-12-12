<?php

namespace App\Services;

use App\Models\AssurePrincipale;
use App\Models\AssureSecondaire;

class InsuredsService {

    public static function getInsured()
    {

    }
    
    public function create(array $data)
    {
        $folder = FoldersService::create($data["folder"]);
        self::createPrincipaleInsured($data["principale_insured"], $folder->id);
        self::createSecondaryInsured($data["secondary_insured"], $folder->id);
    }

    public static function createPrincipaleInsured(array $data, int $folder_id)
    {
        $insured = new AssurePrincipale();
        $insured->folder_id = $folder_id;
        $insured->civilite = $data["civilite"] ?? null;
        $insured->code_organisme = $data["code_organisme"] ?? null;
        $insured->departement_naissance = $data["departement_naissance"] ?? null;
        $insured->email = $data["email"] ?? null;
        $insured->etat_civil = $data["etat_civil"] ?? null;
        $insured->numero_securite_social = $data["numero_securite_social"] ?? null;
        $insured->nom_famille = $data["nom_famille"] ?? null;
        $insured->prenom = $data["prenom"] ?? null;
        $insured->nom_jeune_fille = $data["nom_jeune_fille"] ?? null;
        $insured->numero_telephone = $data["numero_telephone"] ?? null;
        $insured->numero_telephone_2 = $data["numero_telephone_2"] ?? null;
        $insured->pays_naissance = $data["pays_naissance"] ?? null;
        $insured->iban = $data["iban"] ?? null;
        $insured->save();
    }

    public static function createSecondaryInsured(array $data, int $folder_id)
    {
        $insured = new AssureSecondaire();
        $insured->folder_id = $folder_id;
        $insured->nom = $data["nom"] ?? null;
        $insured->prenom = $data["prenom"] ?? null;
        $insured->date_naissance = $data["date_naissance"];
        $insured->civilite = $data["civilite"] ?? null;
        $insured->numero_securire_sociale = $data["numero_securire_sociale"] ?? null;
        $insured->type = $data["type"];
        $insured->save();
    }


}