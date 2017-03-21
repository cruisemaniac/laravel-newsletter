<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailingList;
use App\Models\Template;
use App\Models\Subscription;
use App\Jobs\SendConfirmationMail;
use App\Http\Requests\UserSubscribeCreateRequest;

class UserSubscribeController extends Controller
{
    //
    public function subscribe(UserSubscribeCreateRequest $request)
    {
        $user = \App\Models\User::find(1);
        $sub = [];
        
        $sub['email'] = $request->input('email');
        $sub['mailing_list_id'] = 1;
        $subscription_id = $user->subscription()->create($sub)->id;
        $subscription = Subscription::find($subscription_id);
        $template = Template::where('name', 'preset_confirm')->first();
        $this->dispatch(new SendConfirmationMail($subscription, $template));

        return view('confirmsubscribe');
    }

    public function confirmsubscription($email, $confirmcode)
    {
        $subscription = Subscription::whereEmail($email)->where('confirm_token', $confirmcode)->whereNull('confirmed_at')->first();

        abort_unless($subscription, 404);
        $dt = new \DateTime();
        $subscription->confirmed_at = $dt->format('Y-m-d H:i:s');
        $subscription->save();


        return view('thankyou');
    }
}
