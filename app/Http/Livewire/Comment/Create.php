<?php

namespace App\Http\Livewire\Comment;

use App\Models\Comment;
use App\Services\CommentsService;
use Livewire\Component;

class Create extends Component
{
    protected $listeners = ['startCommentEditing'];
    protected $rules = [
        // "folder_id" => "required|exists:folders,id",
        "comment" => "required|string",
        "status" => "required|string|in:URGENT,INFORMATIVE,EN_COURS,COMPLET"
    ];

    public $comment_id;
    public $comment;
    public $status;
    public $folderId;
    public $updating = false;

    public function render()
    {
        return view('comment.create');
    }

    public function add()
    {
        $this->validate();

        CommentsService::create([
            "comment" => $this->comment,
            "status" => $this->status
        ], $this->folderId);

        $this->emit('CommentAdded');
    }

    public function startCommentEditing($comment)
    {
        $this->comment_id = $comment['id'];
        $this->comment = $comment['comment'];
        $this->status = $comment['status'];
        $this->updating = true;
    }

    public function edit()
    {
        $this->validate();

        CommentsService::edit([
            "folder_id" => $this->folderId,
            "comment" => $this->comment,
            "status" => $this->status,
        ], $this->comment_id);

        $this->updating = false;
        $this->comment = "";
        $this->status = "";

        $this->emit('CommentAdded');
    }

    public function cancelEdit()
    {
        $this->name = "";
        $this->date = "";
        $this->updating = false;
    }
}