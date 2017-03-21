<?php

namespace App\Jobs;

use App\Mail\ConfirmationMail;
use App\Models\Subscription;
use App\Models\Template;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

/**
 * @property Campaign   campaign
 * @property Template   template
 * @property Collection subscriptions
 */
class SendConfirmationMail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $subscription;
    protected $template;

    public function __construct($subscription, Template $template)
    {
        $this->subscription = $subscription;
        $this->template = $template;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Log::info('inside mail handler: '. $this->subscription->email);
        Mail::to($this->subscription)->send(new ConfirmationMail($this->subscription, $this->template));
    }
}
