<?php

namespace App\Services;

use App\Models\Folder;
use App\Models\Insured;

class InsuredsService
{

    public static function getInsured(Folder $folder, array $options)
    {
        return $folder->insureds()->orderBy($options["orderBy"], $options["orderDirection"])->paginate($options["limit"]);
    }

    public static function create(array $folder, array $insureds, array $comments, array $medias, array $appointments)
    {
        $folder = FoldersService::create($folder);
        $comments = CommentsService::create($comments, $folder->id);
        $medias = MediasService::create($medias, $folder->id);
        $appointments = AppointementsService::create($appointments, $folder->id);

        self::createInsured($insureds, $folder->id);
    }

    public static function createInsured(array $insureds, int $folder_id)
    {
        foreach ($insureds as $type => $data) {
            $insured = new Insured();
            $insured->folder_id = $folder_id;
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
            $insured->type = $type;
            $insured->save();
        }

        return true;
    }

    public static function editInsured(array $data, int $insured_id)
    {
        $insured = Insured::find($insured_id);
        if (!$insured) return false;

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
