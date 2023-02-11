<?php

namespace App\Console\Commands;

use App\Events\CloseAppointments;
use App\Events\CloseMettings;
use App\Models\Appointement;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckCloseAppointments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'appointment:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the close appointments in the last 24 hours';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $appointments = Appointement::where('date', '>', now('Africa/Casablanca'))->where('date', '<', now()->addDay())->orderBy('date', 'asc')->limit(10)->get();
        if($appointments->count() > 0)
            CloseAppointments::dispatch($appointments);

        return Command::SUCCESS;
    }
}
