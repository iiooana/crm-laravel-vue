<?php

namespace App\Jobs;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Broadcasting\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Throwable;

class ResetEmailVerify implements ShouldQueue, ShouldBeUnique
{

    public $queue = 'normal';
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $carbon = new Carbon('now');
        $date = $carbon->subDays(20);
        //Reset the email verify at
        User::where('last_login', '<=', $date->toDateTimeString())->update([
            'email_verified_at' => null
        ]);
    }
    public function failed(?Throwable $exception) {}
}
