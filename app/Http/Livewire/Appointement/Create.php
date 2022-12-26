<?php

namespace App\Http\Livewire\Appointement;

use App\Services\AppointementsService;
use Livewire\Component;

class Create extends Component
{
    protected $listeners = ['folderCreated' => 'folderId'];
    protected $rules = [
        "folder_id" => "required|exists:folders,id",
        "name" => "required|string",
        "date" => "required|date_format:Y-m-d H:i:s"
    ];

    public $name;
    public $date;
    public $folder_id;

    public function render()
    {
        return view('appointement.create');
    }

    public function folderId($folder_id)
    {
        $this->folder_id = $folder_id;
    }

    public function add()
    {
        $this->validate();
        
        AppointementsService::create([
            "name" => $this->name,
            "date" => $this->date,
        ], $this->folder_id);
    }
}
