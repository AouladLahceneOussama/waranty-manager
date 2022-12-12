<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MeidasService {

    public static function getMedia(int $folder_id)
    {
        $media = Media::where("folder_id", $folder_id)->get();
        return $media;
    }
    
    public static function saveMedia(array $data)
    {
        // save in our storage
        $identifier = base64_decode(Str::random(32));
        Storage::put($identifier, $data["file"]);

        // save to db
        $media = new Media();
        $media->folder_id = $data["folder_id"];
        $media->identifier = $identifier;
        $media->name = $data["file"]->getClientOriginalName();
        $media->save();
    }

    public static function deleteMedia(int $media_id)
    {
        $media = Media::find($media_id);
        if(!$media) return false;
        
        $media->delete();
        return true;
    }
}