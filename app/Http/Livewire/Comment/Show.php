<?php

namespace App\Http\Livewire\Comment;

use App\Services\CommentsService;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ['CommentAdded'];

    public $folderId;
    public $comments;

    public function render()
    {
        $this->comments = CommentsService::get($this->folderId);
        return view('comment.show');
    }

    public function CommentAdded()
    {
        $this->comments = CommentsService::get($this->folderId);
    }

    public function delete($comment_id)
    {
        CommentsService::delete($comment_id);
        $this->comments = CommentsService::get($this->folderId);
        $this->emit('newResponse', [
            'error' => false,
            'redirect' => [
                'ok' => false,
                'url' => '/',
                'msg' => ''
            ],
            'msg' => 'Commentaire est bien supprimer',
            'data' => ""
        ]);
    }

    public function edit($comment_id)
    {
        $comment = CommentsService::getComment($comment_id);
        $this->emit('startCommentEditing', $comment);
    }
    
}