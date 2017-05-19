<?php

namespace App\Mail;

use App\Models\Campaign;
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
class CampaignMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $subscription, $campaign, $template;

    public function __construct(Subscription $subscription, Campaign $campaign, Template $template)
    {
        $this->subscription = $subscription;
        $this->campaign = $campaign;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $final_array = [];
        $final_array['%subject%'] = $this->campaign->subject;
        $final_array['%email%'] = $this->subscription->email;
        $final_array['%content%'] = $this->campaign->content;
        $final_array['%unsubscribe_link%'] = route('subscriptions.preunsubscribe', [$this->subscription->email, $this->subscription->unsubscribe]);

        $content = str_replace(array_keys($final_array), array_values($final_array), $this->template->content);

        return $this->subject( env('SITE_NAME')."- ". $this->campaign->subject)->view('emails.campaign')->with(['content' => $content]);
        // return $this->subject( env('SITE_NAME').": ". $this->campaign->subject)->view('emails.campaign')->with([
        //     'content' => $this->str_replace_dynamic([
        //         '%subject%' => $this->campaign->subject,
        //         '%email%' => $this->subscription->email,
        //         '%content%' => $this->campaign->content,
        //         '%unsubscribe_link%' => route('subscriptions.preunsubscribe', [$this->subscription->email, $this->subscription->unsubscribe])
        //     ], $this->template->content)
        // ]);
    }

    public function str_replace_dynamic(array $replace, $string)
    {
        return str_replace(array_keys($replace), array_values($replace), $string);
    }
}
