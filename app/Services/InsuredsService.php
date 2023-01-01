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

    public static function create(array $insureds, int $folder_id)
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

    public static function createOne(array $insured, $folder_id)
    {
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
        $insured->type = $insured->type;
        $insured->save();
    }

    public static function edit(array $data, int $insured_id)
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

    public static function updateOrCreateChilds(array $childs)
    {
        foreach ($childs as $child) {
            $insured = Insured::find($child->id);
            if (!$insured) self::createOne($child, $child->folder_id);
            else self::edit($child, $child->id);
        }
    }
}
