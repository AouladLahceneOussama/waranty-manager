<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediasService
{

    public static function get(int $folder_id)
    {
        $media = Media::where("folder_id", $folder_id)->get();
        return $media;
    }

    public static function create(array $medias, int $folder_id)
    {
        foreach ($medias as $media) {
            $media_name = $media->getClientOriginalName();
            $ext = pathinfo($media_name, PATHINFO_EXTENSION);

            // save in our storage
            $identifier = Str::random(32) . "." . $ext;
            Storage::putFileAs('public/media', $media, $identifier);

            // save to db
            $media_db = new Media();
            $media_db->folder_id = $folder_id;
            $media_db->identifier = base64_encode("media/" . $identifier);
            $media_db->name = $media_name;
            $media_db->save();
        }

        return true;
    }

    public static function delete(int $media_id)
    {
        $media = Media::find($media_id);
        if (!$media) return false;

        Storage::delete("public/" . base64_decode($media->identifier));
        $media->delete();
        return true;
    }
}
