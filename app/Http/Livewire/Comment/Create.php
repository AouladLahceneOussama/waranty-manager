<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;

class Create extends Component
{
    public $comment;
    
    public function render()
    {
        return view('comment.create');
    }
}