<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class CommentsService {

    public static function get(int $folder_id)
    {
        $folder = Folder::find($folder_id);
        return $folder->comments()->latest()->get();
    }
    
    public static function getComment(int $comment_id)
    {
        $comment = Comment::find($comment_id);
        return $comment;
    }

    public static function create(array $data, int $folder_id)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->folder_id = $folder_id;
        $comment->comment = $data["comment"];
        $comment->status = $data["status"];
        $comment->save();

        return $comment;
    }

    public static function edit(array $data, int $comment_id)
    {
        $comment = Comment::find($comment_id);
        if(!$comment) return false;

        $comment->comment = $data["comment"];
        $comment->status = $data["status"];
        $comment->save();

        return $comment;
    }

    public static function delete(int $comment_id)
    {
        $comment = Comment::find($comment_id);
        if(!$comment) return false;
        
        $comment->delete();
        return true;
    }
}