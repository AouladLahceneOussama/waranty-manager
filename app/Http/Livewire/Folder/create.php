<?php

namespace App\Http\Livewire\Folder;

use Livewire\Component;
use Livewire\WithPagination;

class Create extends Component
{
    use WithPagination;

    public $folder;
    public $test = 10;
    public $enfants = [''];

    public function render()
    {
        return view('folder.create',["test"=>$this->test]);
    }

}
