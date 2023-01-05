<?php

namespace App\Services;

use App\Models\Appointement;
use App\Models\Comment;
use Carbon\Carbon;

class DashboardService
{

    public static function getUrgentComments()
    {
        $comments = Comment::where("status", "URGENT")->paginate(50);
        return $comments;
    }

    public static function getCloserAppointment()
    {
        $appoitments = Appointement::where('date', '>', Carbon::now('Africa/Casablanca'))->orderBy('date', 'asc')->paginate(50);
        return $appoitments;
    }

}
