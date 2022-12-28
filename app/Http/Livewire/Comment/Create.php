<?php

namespace App\Http\Livewire\Comment;

use App\Services\CommentsService;
use Livewire\Component;

class Create extends Component
{
    protected $listeners = ['folderCreated' => 'folderId'];
    protected $rules = [
        "folder_id" => "required|exists:folders,id",
        "comment" => "required|string",
        "status" => "required|string|in:URGENT,INFORMATIVE,EN_COURS"
    ];

    public $comment;
    public $status;
    public $folder_id;

    public function render()
    {
        return view('comment.create');
    }

    public function folderId($folder_id)
    {
        $this->folder_id = $folder_id;
    }

    public function add()
    {
        $this->validate();

        CommentsService::create([
            "comment" => $this->comment,
            "status" => $this->status
        ], $this->folder_id);
    }
}