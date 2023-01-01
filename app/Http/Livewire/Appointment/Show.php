<?php

namespace App\Http\Livewire\Appointment;

use App\Services\AppointementsService;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ['AppointementAdded'];

    public $folderId;
    public $appointments;

    public function render()
    {
        $this->appointments = AppointementsService::get($this->folderId);
        return view('appointment.show');
    }

    public function AppointementAdded()
    {
        $this->appointments = AppointementsService::get($this->folderId);
    }

    public function edit($appointment_id)
    {
        $appointment = AppointementsService::getAppointment($appointment_id);
        $this->emit('startEditing', $appointment);
    }

    public function delete($appointment_id)
    {
        AppointementsService::delete($appointment_id);
        $this->appointments = AppointementsService::get($this->folderId);
    }
}
