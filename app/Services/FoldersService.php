<?php

namespace App\Services;

use App\Models\Appointement;
use App\Models\Comment;
use App\Models\Folder;
use App\Models\Insured;
use App\Models\Media;

class FoldersService
{

    public static function getAll(array $options)
    {
        $folders = Folder::orderBy($options["orderBy"], $options["orderDirection"])->paginate($options["limit"]);
        return $folders;
    }

    public static function get(int $folder_id)
    {
        $folder = Folder::find($folder_id);
        if (!$folder) return null;

        return $folder;
    }

    public static function create(array $data)
    {
        $folder = new Folder();
        $folder->compagnie = $data["numero_adheration"];
        $folder->compagnie = $data["compagnie"];
        $folder->souscripteur = $data["souscripteur"];
        $folder->date_effet = $data["date_effet"];
        $folder->cotisation_ht = $data["cotisation_ht"];
        $folder->cotisation_ttc = $data["cotisation_ttc"];
        $folder->status = $data["status"] ?? "INCOMPLET";
        $folder->save();

        return $folder;
    }

    public static function edit(array $data, int $folder_id)
    {
        $folder = Folder::find($folder_id);
        if (!$folder) return false;

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
        if (!$folder) return false;

        Insured::where("folder_id", $folder_id)->delete();
        Appointement::where("folder_id", $folder_id)->delete();
        Media::where("folder_id", $folder_id)->delete();
        Comment::where("folder_id", $folder_id)->delete();
        $folder->delete();
        return true;
    }

    public static function simpleSearch(string $query, array $options)
    {
        $folders = Folder::where('compagnie', 'LIKE', "%{$query}%") 
        ->orWhere('cotisation_ht', 'LIKE', "%{$query}%") 
        ->orWhere('cotisation_ttc', 'LIKE', "%{$query}%") 
        ->orWhere('status', 'LIKE', "%{$query}%") 
        ->orderBy($options["orderBy"], $options["orderDirection"])
        ->paginate($options["limit"]);

        return $folders;
    }

    public static function search(string $query, array $options)
    {
        // $query = DATE_EFFET::date1,date2,COMPAGNIE::samsung,PHONE::34130320932,EMAIL::asdasd@test.com,NUMERO_ADHERATION::isjfdaisjd
        $folders = Folder::query();
        $queries = explode(",", $query);

        foreach ($queries as $q) {
            $search = explode("::", $q);
            $column = $search[0];
            $value = urldecode($search[1]);

            switch ($column) {
                case "DATE_EFFET":
                    $folders = $folders->whereBetween(strtolower($column), explode(",", $value));
                    break;

                case "COMPAGNIE":
                    $folders = $folders->where(strtolower($column), "LIKE", "%$value%");
                    break;

                case "PHONE":
                    $folders = $folders->join('insureds as i1', function ($join) use($value){
                        $join->on('folders.id', '=', 'i1.folder_id')
                             ->where('i1.primary_phone', 'LIKE', "%$value%")
                             ->orWhere('i1.secondary_phone', 'LIKE', "%$value%");
                    });
                    break;

                case "EMAIL":
                    $folders = $folders->join('insureds as i2', function ($join) use($value){
                        $join->on('folders.id', '=', 'i2.folder_id')
                             ->where('i2.email', 'LIKE', "%$value%");
                    });
                    break;

                case "NUMERO_ADHERATION":
                    $folders = $folders->where(strtolower($column), "LIKE", "%$value%");
                    break;

                default:
                    break;
            }
        }

        $folders =  $folders->orderBy('folders.'.$options["orderBy"], $options["orderDirection"])->paginate($options["limit"]);
        return $folders;
    }
}
