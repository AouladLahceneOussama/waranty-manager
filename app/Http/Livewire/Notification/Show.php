<?php

namespace App\Http\Livewire\Notification;

use App\Models\Appointement;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ["echo-private:appointments,CloseAppointments" => "notifyNewAppointments"];

    public $notifications = [];

    public function render()
    {
        $this->notifications = Appointement::where('date', '>', now('Africa/Casablanca'))->orderBy('date', 'asc')->where('date', '<', now()->addDay())->limit(10)->get();
        return view('notification.show', [
            'notifications' => $this->notifications
        ]);
    }

    public function notifyNewAppointments($data)
    {   
        $this->notifications = $data;
    }
}