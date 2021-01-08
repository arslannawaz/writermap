<?php

namespace App\Observers;

use App\Models\User;
use Stripe\StripeClient;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $stripe = new StripeClient('sk_test_51I701bBSVLSB8icBDKVpksG2XE0i2n7vPrlGFHaMiqKkLDQ7AlIjraNPvn65wZZpeZtr9GIrTjTyCcokDPSCnFSr00T4TF1iFt');
        $stripeCustomer = $stripe->customers->create([
            'email' => $user->email,
        ]);

        $user->stripe_customer = $stripeCustomer->id;
        $user->save();
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
