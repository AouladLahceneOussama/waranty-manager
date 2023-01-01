<?php

namespace App\Http\Livewire\Appointment;

use App\Services\AppointementsService;
use Livewire\Component;

class Create extends Component
{
    protected $listeners = ['startEditing'];
    protected $rules = [
        // "folderId" => "required|exists:folders,id",
        "name" => "required|string",
        // "date" => "required|date_format:Y-m-d\TH:i"
        "date" => "required"
    ];

    public $name;
    public $date;
    public $folderId;
    public $updating = false;
    public $appointement_id;

    public function render()
    {
        return view('appointment.create');
    }

    public function add()
    {
        $this->validate();
     
        AppointementsService::create([
            "name" => $this->name,
            "date" => $this->date,
        ], $this->folderId);

        $this->emit('AppointementAdded');
    }

    public function startEditing($appointement)
    {
        $this->appointement_id = $appointement['id'];
        $this->name = $appointement['name'];
        $this->date = date('Y-m-d\TH:i', strtotime($appointement['date']));
        $this->updating = true;
    }

    public function edit()
    {
        $this->validate();

        AppointementsService::edit([
            "folder_id" => $this->folderId,
            "name" => $this->name,
            "date" => $this->date,
        ], $this->appointement_id);

        $this->updating = false;
        $this->name = "";
        $this->date = "";

        $this->emit('AppointementAdded');
    }

    public function cancelEdit()
    {
        $this->name = "";
        $this->date = "";
        $this->updating = false;
    }
}
