<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\StripeClient;

class ProfileController extends Controller
{
    public function addCard()
    {
        $stripe = new StripeClient(env('STRIPE_SK_KEY'));
        $user = \Auth::user();

        if ($user->stripe_card !== null) {
            $stripe->customers->deleteSource($user->stripe_customer, $user->stripe_card);
        }

        $sourceCard = $stripe->customers->createSource($user->stripe_customer, [
            'source' => 'tok_visa',
        ]);
        $user->stripe_card = $sourceCard->id;
        $user->stripe_card_last_4 = $sourceCard->last4;
        $user->save();

        return $sourceCard;
    }

    public function currentSubscription()
    {
        $user = \Auth::user();
        if ($user->stripe_subscription !== null) {
            $stripe = new StripeClient(env('STRIPE_SK_KEY'));
            return $stripe->subscriptions->retrieve($user->stripe_subscription);
        }

        return null;
    }

    public function changeSubscription()
    {
        $this->cancelSubscription();

        $stripe = new StripeClient(env('STRIPE_SK_KEY'));
        $user = \Auth::user();

        $stripeSubscription = $stripe->subscriptions->create([
            'customer' => $user->stripe_customer,
            'items' => [
                ['price' => 'price_1I72SxBSVLSB8icBdNiONrz3'],
            ],
            'trial_period_days' => 7,
        ]);

        $user->stripe_subscription = $stripeSubscription->id;
        $user->save();

        return $stripeSubscription;
    }

    public function cancelSubscription()
    {
        $user = \Auth::user();
        if ($user->stripe_subscription !== null) {
            $stripe = new StripeClient(env('STRIPE_SK_KEY'));
            $stripe->subscriptions->cancel($user->stripe_subscription);

            $user->stripe_subscription = null;
            $user->save();
        }
        return true;
    }

    public function invoices()
    {
        $stripe = new StripeClient(env('STRIPE_SK_KEY'));
        $user = \Auth::user();

        return $stripe->invoices->all(['customer' => $user->stripe_customer]);
    }
}
