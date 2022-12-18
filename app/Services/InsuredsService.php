<?php

namespace App\Services;

use App\Models\Folder;
use App\Models\Insured;

class InsuredsService {

    public static function getInsured(Folder $folder, array $options)
    {  
        return $folder->insureds()->orderBy($options["orderBy"], $options["orderDirection"])->paginate($options["limit"]);
    }
    
    public static function create(array $data)
    {
        $folder = FoldersService::create($data["folder"]);
        self::createInsured($data, $folder->id);
        // self::createPrincipaleInsured($data["principale_insured"], $folder->id);
        // self::createSecondaryInsured($data["secondary_insured"], $folder->id);
    }

    public static function createInsured(array $data, int $folder_id)
    {
        foreach($data as $d){
            $insured = new Insured();
            $insured->folder_id = $folder_id;
            $insured->civilite = $d["civilite"] ?? null;
            $insured->code_organisme = $d["code_organisme"] ?? null;
            $insured->departement_naissance = $d["departement_naissance"] ?? null;
            $insured->email = $d["email"] ?? null;
            $insured->etat_civil = $d["etat_civil"] ?? null;
            $insured->numero_securite_social = $d["numero_securite_social"] ?? null;
            $insured->nom_famille = $d["nom_famille"] ?? null;
            $insured->prenom = $d["prenom"] ?? null;
            $insured->nom_jeune_fille = $d["nom_jeune_fille"] ?? null;
            $insured->numero_telephone = $d["numero_telephone"] ?? null;
            $insured->numero_telephone_2 = $d["numero_telephone_2"] ?? null;
            $insured->pays_naissance = $d["pays_naissance"] ?? null;
            $insured->iban = $d["iban"] ?? null;
            $insured->save();
        }

        return true;
    }

    public static function editInsured(array $data, int $insured_id)
    {
        $insured = Insured::find($insured_id);
        if(!$insured) return false;

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

        return $insured;
    }

    // TODO
    public static function search()
    {

    }
    // public static function createPrincipaleInsured(array $data, int $folder_id)
    // {
    //     $insured = new AssurePrincipale();
    //     $insured->folder_id = $folder_id;
    //     $insured->civilite = $data["civilite"] ?? null;
    //     $insured->code_organisme = $data["code_organisme"] ?? null;
    //     $insured->departement_naissance = $data["departement_naissance"] ?? null;
    //     $insured->email = $data["email"] ?? null;
    //     $insured->etat_civil = $data["etat_civil"] ?? null;
    //     $insured->numero_securite_social = $data["numero_securite_social"] ?? null;
    //     $insured->nom_famille = $data["nom_famille"] ?? null;
    //     $insured->prenom = $data["prenom"] ?? null;
    //     $insured->nom_jeune_fille = $data["nom_jeune_fille"] ?? null;
    //     $insured->numero_telephone = $data["numero_telephone"] ?? null;
    //     $insured->numero_telephone_2 = $data["numero_telephone_2"] ?? null;
    //     $insured->pays_naissance = $data["pays_naissance"] ?? null;
    //     $insured->iban = $data["iban"] ?? null;
    //     $insured->save();
    // }

    // public static function createSecondaryInsured(array $data, int $folder_id)
    // {
    //     $insured = new AssureSecondaire();
    //     $insured->folder_id = $folder_id;
    //     $insured->nom = $data["nom"] ?? null;
    //     $insured->prenom = $data["prenom"] ?? null;
    //     $insured->date_naissance = $data["date_naissance"];
    //     $insured->civilite = $data["civilite"] ?? null;
    //     $insured->numero_securire_sociale = $data["numero_securire_sociale"] ?? null;
    //     $insured->type = $data["type"];
    //     $insured->save();
    // }

}