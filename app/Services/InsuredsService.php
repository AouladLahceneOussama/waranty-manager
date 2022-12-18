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
        self::createInsured($data["insureds"], $folder->id);
        // self::createPrincipaleInsured($data["principale_insured"], $folder->id);
        // self::createSecondaryInsured($data["secondary_insured"], $folder->id);
    }

    public static function createInsured(array $data, int $folder_id)
    {
        foreach($data as $d){
            $insured = new Insured();
            $insured->folder_id = $folder_id;
            $insured->nom = $d["nom"] ?? null;
            $insured->prenom = $d["prenom"] ?? null;
            $insured->nom_jeune_fille = $d["nom_jeune_fille"] ?? null;
            $insured->primary_phone = $d["primary_phone"] ?? null;
            $insured->secondary_phone = $d["secondary_phone"] ?? null;
            $insured->email = $d["email"] ?? null;
            $insured->pays_naissance = $d["pays_naissance"] ?? null;
            $insured->departement_naissance = $d["departement_naissance"] ?? null;
            $insured->date_naissance = $d["date_naissance"] ?? null;
            $insured->civilite = $d["civilite"] ?? null;
            $insured->etat_civil = $d["etat_civil"] ?? null;
            $insured->code_organisme = $d["code_organisme"] ?? null;
            $insured->code_securite_social = $d["code_securite_social"] ?? null;
            $insured->iban = $d["iban"] ?? null;
            $insured->jour_prelevement = $d["jour_prelevement"] ?? null;
            $insured->save();
        }

        return true;
    }

    public static function editInsured(array $data, int $insured_id)
    {
        $insured = Insured::find($insured_id);
        if(!$insured) return false;

        $insured->nom = $data["nom"] ?? null;
        $insured->prenom = $data["prenom"] ?? null;
        $insured->nom_jeune_fille = $data["nom_jeune_fille"] ?? null;
        $insured->primary_phone = $data["primary_phone"] ?? null;
        $insured->secondary_phone = $data["secondary_phone"] ?? null;
        $insured->email = $data["email"] ?? null;
        $insured->pays_naissance = $data["pays_naissance"] ?? null;
        $insured->departement_naissance = $data["departement_naissance"] ?? null;
        $insured->date_naissance = $data["date_naissance"] ?? null;
        $insured->civilite = $data["civilite"] ?? null;
        $insured->etat_civil = $data["etat_civil"] ?? null;
        $insured->code_organisme = $data["code_organisme"] ?? null;
        $insured->code_securite_social = $data["code_securite_social"] ?? null;
        $insured->iban = $data["iban"] ?? null;
        $insured->jour_prelevement = $data["jour_prelevement"] ?? null;
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
    //     $insured->code_securite_social = $data["code_securite_social"] ?? null;
    //     $insured->nom = $data["nom"] ?? null;
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