<?php

namespace App\Listeners;

use App\Events\SendConfirmationMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendConfirmationMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendCampaign  $event
     * @return void
     */
    public function handle(SendConfirmationMail $event)
    {
        //
    }
}
