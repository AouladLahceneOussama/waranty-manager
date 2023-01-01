<?php

namespace App\Services;

use App\Models\Appointement;
use App\Models\Folder;
use Carbon\Carbon;

class AppointementsService {

    public static function get(int $folder_id)
    {
        $folder = Folder::find($folder_id);
        return $folder->appointements()->where('date', '>', Carbon::now('Africa/Casablanca'))->orderBy('date', 'asc')->get();
    }
    
    public static function getAppointment($appointment_id)
    {
        $appointment = Appointement::find($appointment_id);
        return $appointment;
    }

    public static function create(array $data, int $folder_id)
    {
        $appointment = new Appointement();
        $appointment->folder_id = $folder_id;
        $appointment->name = $data["name"];
        $appointment->date = Carbon::createFromFormat('Y-m-d\TH:i', $data["date"]);
        $appointment->save();
        
        return $appointment;
    }

    public static function edit(array $data, int $appointment_id)
    {
        $appointment = Appointement::find($appointment_id);
        if(!$appointment) return false;

        // dd(date('Y-m-d\TH:i', strtotime($data['date'])));

        $appointment->folder_id = $data["folder_id"];
        $appointment->name = $data["name"];
        $appointment->date = date('Y-m-d\TH:i', strtotime($data['date']));
        $appointment->save();

        return $appointment;
    }

    public static function delete(int $appointment_id)
    {
        $appointment = Appointement::find($appointment_id);
        if(!$appointment) return false;
        
        $appointment->delete();
        return true;
    }

    public static function closeAppointements()
    {
        $appointments = Appointement::whereBetween('date', [Carbon::now()->subDays(3)->toDateString(), Carbon::now()->toDateString()]);
        return $appointments;
    }
}