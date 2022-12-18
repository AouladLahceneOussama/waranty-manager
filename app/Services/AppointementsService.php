<?php

namespace App\Services;

use App\Models\Appointement;
use App\Models\Folder;

class AppointementsService {

    public static function get(Folder $folder)
    {
        return $folder->appointements();
    }
    
    public static function create(array $data)
    {
        $appointment = new Appointement();
        $appointment->folder_id = $data["folder_id"];
        $appointment->name = $data["name"];
        $appointment->date = $data["date"];
        $appointment->save();

        return $appointment;
    }

    public static function edit(array $data, int $appointment_id)
    {
        $appointment = Folder::find($appointment_id);
        if(!$appointment) return false;

        $appointment->folder_id = $data["folder_id"];
        $appointment->name = $data["name"];
        $appointment->date = $data["date"];
        $appointment->save();

        return $appointment;
    }

    public static function delete(int $appointment_id)
    {
        $appointment = Folder::find($appointment_id);
        if(!$appointment) return false;
        
        $appointment->delete();
        return true;
    }
}