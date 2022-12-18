<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class CommentsService {

    public static function get(Folder $folder)
    {
        return $folder->comments();
    }
    
    public static function create(array $data)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->folder_id = $data["folder_id"];
        $comment->message = $data["message"];
        $comment->save();

        return $comment;
    }

    public static function edit(array $data, int $comment_id)
    {
        $comment = Folder::find($comment_id);
        if(!$comment) return false;

        $comment->message = $data["message"];
        $comment->status = $data["status"];
        $comment->save();

        return $comment;
    }

    public static function delete(int $comment_id)
    {
        $comment = Folder::find($comment_id);
        if(!$comment) return false;
        
        $comment->delete();
        return true;
    }
}