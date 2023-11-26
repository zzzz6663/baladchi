<?php

namespace App\Jobs;

use Exception;
use Carbon\Carbon;
use App\Models\Chat;
use App\Models\User;
use App\Models\Advertise;
use Illuminate\Bus\Queueable;
use App\Notifications\SendKaveCode;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class DepositManagerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        // $produce=\App\Models\Barcode::whereDate('created_at', \Carbon\Carbon::today())->count();
        // $serive=\App\Models\Repair:: whereDate('created_at', \Carbon\Carbon::today())->count();
        // $sell=\App\Models\Barcode::whereDate('sell', \Carbon\Carbon::today())->count();
        // $invitedUser = new User();
        // $invitedUser->notify(new SendKaveCode( '09121498571','daily-report',$produce,$serive,$sell));
        Log::info('new jbov');
        // Chat::create([
        //     'advertise_id'=>1,
        //     'visitor_id'=>1,
        //     'chat'=>1,
        //     'type'=>"advertise",
        //     'user_id'=>1,
        // ]);
    }
}
