<?php

namespace App\Livewire;

use App\Jobs\SyncSubscriberToBrevoJob;
use App\Mail\WelcomeNewsletterMail;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class NewsletterForm extends Component
{
    public string $email = '';
    public string $source = 'website_footer';
    public bool $subscribed = false;

    protected array $rules = [
        'email' => 'required|email|max:255',
    ];

    public function subscribe(): void
    {
        $this->validate();

        $subscriber = Subscriber::firstOrCreate(
            ['email' => $this->email],
            ['source' => $this->source, 'is_subscribed' => true]
        );

        if (!$subscriber->is_subscribed) {
            $subscriber->update(['is_subscribed' => true]);
        }

        // Dispatch async job to sync contact to Brevo
        SyncSubscriberToBrevoJob::dispatch($subscriber->email, [
            'SOURCE' => $this->source,
        ]);

        // Send welcome email
        Mail::to($subscriber->email)->queue(new WelcomeNewsletterMail());

        $this->subscribed = true;
        $this->reset('email');
    }

    public function render()
    {
        return view('livewire.newsletter-form');
    }
}
