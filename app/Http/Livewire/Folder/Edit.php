<?php

namespace App\Http\Livewire\Folder;

use App\Services\FoldersService;
use Livewire\Component;
use Livewire\WithPagination;

class Edit extends Component
{
    use WithPagination;

    public $folder;

    public function render()
    {
        return view('folder.edit', ['folder' => $this->folder]);
    }

}
