<?php

namespace App\Livewire;

use App\Jobs\SyncSubscriberToBrevoJob;
use App\Mail\WelcomeNewsletterMail;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class NewsletterForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $source = 'footer';
    public bool $subscribed = false;

    protected function rules(): array
    {
        return [
            'name' => in_array($this->source, ['footer', 'website_footer']) ? 'nullable|string|max:100' : 'required|string|min:2|max:100',
            'email' => 'required|email|max:255',
        ];
    }

    protected array $messages = [
        'name.required' => 'Please enter your name.',
        'name.min' => 'Name must be at least 2 characters.',
        'email.required' => 'Please enter your email address.',
        'email.email' => 'Please enter a valid email address.',
    ];

    public function subscribe(): void
    {
        $this->validate();

        $subscriber = Subscriber::updateOrCreate(
            ['email' => $this->email],
            [
                'name' => !empty($this->name) ? $this->name : null,
                'source' => $this->source,
                'is_subscribed' => true,
            ]
        );

        if (!$subscriber->is_subscribed) {
            $subscriber->update(['is_subscribed' => true]);
        }

        // Dispatch async job to sync contact to Brevo
        SyncSubscriberToBrevoJob::dispatch($subscriber->email, [
            'NAME' => $this->name,
            'FIRSTNAME' => $this->name,
            'SOURCE' => $this->source,
        ]);

        // Send welcome email
        try {
            Mail::to($subscriber->email)->queue(new WelcomeNewsletterMail());
        } catch (\Throwable $e) {
            Log::warning('Newsletter welcome email queue failed: ' . $e->getMessage());
        }

        $this->subscribed = true;
        $this->reset(['name', 'email']);
    }

    public function render()
    {
        return view('livewire.newsletter-form');
    }
}
