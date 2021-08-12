<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckUserSubscriptionIsEnded extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:subscriptions:check-and-delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('stripe_subscription_ended_at', '<=', Carbon::now())->get();

        ray('users', $users);

        /** @var User $user */
        foreach ($users as $user) {
            $user->deleteSubscription();
        }

        return 0;
    }
}
