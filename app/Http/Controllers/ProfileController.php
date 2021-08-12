<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stripe\BaseStripeClient;
use Stripe\PromotionCode;
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
            'source' => \request('stripe_card_token'),
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

    public function changeSubscription(Request $request)
    {
        $this->cancelSubscription();

        $stripe = new StripeClient(env('STRIPE_SK_KEY'));
        $user = \Auth::user();

        $data = [
            'customer' => $user->stripe_customer,
            'items' => [
                ['price' => env('STRIPE_PRICE_IO')],
            ],
            'trial_period_days' => env('STRIPE_TRIAL_PERIOD_DAYS'),
        ];

        if ($request->post('promocode') !== null) {
            $data['promotion_code'] = $request->post('promocode');
        }

        $stripeSubscription = $stripe->subscriptions->create($data);

        ray('stripe subscription', $stripeSubscription);

        $user->stripe_subscription = $stripeSubscription->id;
        $user->stripe_subscription_started_at = date('Y-m-d H:i:s', $stripeSubscription->current_period_start);
        $user->stripe_subscription_ended_at = date('Y-m-d H:i:s', $stripeSubscription->current_period_end);
        $user->save();

        return $stripeSubscription;
    }

    public function cancelSubscription()
    {
        /** @var User $user */
        $user = \Auth::user();
        if ($user->stripe_subscription !== null) {
            $stripe = new StripeClient(env('STRIPE_SK_KEY'));
            $stripe->subscriptions->cancel($user->stripe_subscription);
            if (Carbon::now() >= $user->stripe_subscription_ended_at) {
                $user->stripe_subscription = null;
                $user->stripe_subscription_started_at = null;
                $user->stripe_subscription_ended_at = null;
                $user->save();
            }
        }

        return true;
    }

    public function invoices()
    {
        $stripe = new StripeClient(env('STRIPE_SK_KEY'));
        $user = \Auth::user();

        return $stripe->invoices->all(['customer' => $user->stripe_customer]);
    }

    public function promocodesList()
    {
        $stripe = new StripeClient(env('STRIPE_SK_KEY'));
        return $stripe->promotionCodes->all();
    }

    public function checkPromocode(Request $request)
    {
        $stripe = new StripeClient(env('STRIPE_SK_KEY'));
        $promocodes = $stripe->promotionCodes->all();

        /** @var PromotionCode $promocode */
        foreach ($promocodes as $promocode) {
            if ($promocode->active === true && $promocode->code === $request->post('promocode')) {
                return $promocode;
            }
        }
        return false;
    }
}
