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

    public static function search(string $query, array $options)
    {
        // $query = DATE_EFFET::date1,date2,COMPAGNIE::samsung,PHONE::34130320932,EMAIL::asdasd@test.com,NUMERO_ADHERATION::isjfdaisjd
        $folders = Folder::latest();
        $queries = explode(",", $query);

        foreach ($queries as $q) {
            $search = explode("::", $q);
            $column = $search[0];
            $value = $search[1];

            switch ($column) {
                case "DATE_EFFET":
                    $folders = $folders->whereBetween(strtolower($column), [$value]);
                    break;

                case "COMPAGNIE":
                    $folders = $folders->where(strtolower($column), "LIKE", "%$value%");
                    break;

                case "PHONE":
                    $folders = $folders->join('insureds', function ($join, $value) {
                        $join->on('folders.id', '=', 'insureds.folder_id')
                             ->where('insureds.primary_phone', 'LIKE', "%$value%")
                             ->orWhere('insureds.secondary_phone', 'LIKE', "%$value%");
                    });
                    break;

                case "EMAIL":
                    $folders = $folders->join('insureds', function ($join, $value) {
                        $join->on('folders.id', '=', 'insureds.folder_id')
                             ->where('insureds.email', 'LIKE', "%$value%");
                    });
                    break;

                case "NUMERO_ADHERATION":
                    $folders = $folders->where(strtolower($column), "LIKE", "%$value%");
                    break;

                default:
                    break;
            }
        }

        $folders = Folder::orderBy($options["orderBy"], $options["orderDirection"])->paginate($options["limit"]);
        return $folders;
    }
}
