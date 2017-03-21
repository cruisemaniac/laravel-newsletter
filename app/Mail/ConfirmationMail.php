<?php

namespace App\Mail;

use App\Models\Template;
use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * @property Subscription subscription
 * @property Campaign     campaign
 * @property Template     template
 */
class ConfirmationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $subscription, $template;

    public function __construct(Subscription $subscription, Template $template)
    {
        $this->subscription = $subscription;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("The Devops List - Confirm your subscription")->view('emails.confirmation')->with([
            'content' => $this->str_replace_dynamic([
                '%subject%' => "The Devops List - Confirm your subscription",
                '%unsubscribe_link%' => route('subscriptions.preunsubscribe', [$this->subscription->email, $this->subscription->unsubscribe]),
                '%confirm_link%' => route('userConfirm', [$this->subscription->email, $this->subscription->confirm_token])
            ], $this->template->content)
        ]);
    }

    public function str_replace_dynamic(array $replace, $string)
    {
        return str_replace(array_keys($replace), array_values($replace), $string);
    }
}
