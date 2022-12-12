<?php

namespace App\Services;

use App\Models\Folder;

class FoldersService {

    public static function getAll(int $limits)
    {
        $folders = Folder::paginate($limits);
        return $folders;
    }

    public static function get(int $folder_id)
    {
        $folder = Folder::find($folder_id);
        if(!$folder) return null;

        return $folder;
    }
    
    public static function create(array $data)
    {
        $folder = new Folder();
        $folder->compagnie = $data["compagnie"];
        $folder->cotisation_ht = $data["cotisation_ht"];
        $folder->cotisation_ttc = $data["cotisation_ttc"];
        $folder->date_effet = $data["date_effet"];
        $folder->souscripteur = $data["souscripteur"];
        $folder->comment = $data["comment"] ?? null;
        $folder->status = $data["status"] ?? "INCOMPLET";
        $folder->save();

        return $folder;
    }

    public static function edit(array $data, int $folder_id)
    {
        $folder = Folder::find($folder_id);
        if(!$folder) return false;

        $folder->compagnie = $data["compagnie"];
        $folder->cotisation_ht = $data["cotisation_ht"];
        $folder->cotisation_ttc = $data["cotisation_ttc"];
        $folder->date_effet = $data["date_effet"];
        $folder->souscripteur = $data["souscripteur"];
        $folder->comment = $data["comment"] ?? null;
        $folder->status = $data["status"] ?? "INCOMPLET";
        $folder->save();

        return $folder;
    }

    public static function delete(int $folder_id)
    {
        $folder = Folder::find($folder_id);
        if(!$folder) return false;
        
        $folder->delete();
        return true;
    }
}