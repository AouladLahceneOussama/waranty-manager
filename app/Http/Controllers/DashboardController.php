<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $comments = DashboardService::getUrgentComments();
        $appointments = DashboardService::getCloserAppointment();
        $statistics = DashboardService::statistics();

        return view("dashboard", compact('comments', 'appointments', 'statistics'));
    }
}
