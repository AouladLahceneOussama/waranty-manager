<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediasService {

    public static function get(int $folder_id)
    {
        $media = Media::where("folder_id", $folder_id)->get();
        return $media;
    }
    
    // TODO accept multiple files
    public static function create(array $data, int $folder_id)
    {
        // save in our storage
        $identifier = base64_decode(Str::random(32));
        Storage::put($identifier, $data["file"]);

        // save to db
        $media = new Media();
        $media->folder_id = $folder_id;
        $media->identifier = $identifier;
        $media->name = $data["file"]->getClientOriginalName();
        $media->save();
    }

    public static function delete(int $media_id)
    {
        $media = Media::find($media_id);
        if(!$media) return false;
        
        $media->delete();
        return true;
    }
}