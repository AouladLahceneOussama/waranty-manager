<?php

namespace App\Services;

use App\Models\Appointement;
use App\Models\Comment;
use App\Models\Folder;
use App\Models\User;
use Carbon\Carbon;

class DashboardService
{

    public static function statistics()
    {
        $folders = Folder::groupBy("status")->selectRaw("status, count(*) as count")->pluck("count", "status");
        $comments = Comment::groupBy("status")->selectRaw("status, count(*) as count")->pluck("count", "status");
        $appointments = Appointement::where('date', '>', Carbon::now('Africa/Casablanca'))->count();
        $users = User::count();
        
        return [
            "users" => $users,
            "folders" => $folders,
            "comments" => $comments,
            "appointments" => $appointments
        ];
    }

    public static function getUrgentComments()
    {
        $comments = Comment::where("status", "URGENT")->paginate(50);
        return $comments;
    }

    public static function getCloserAppointment()
    {
        Carbon::setLocale('fr');
        $appoitments = Appointement::where('date', '>', Carbon::now('Africa/Casablanca'))->orderBy('date', 'asc')->paginate(50);
        return $appoitments;
    }

}
