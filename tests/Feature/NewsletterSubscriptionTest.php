<?php

namespace Tests\Feature;

use App\Jobs\SyncSubscriberToBrevoJob;
use App\Livewire\NewsletterForm;
use App\Models\Subscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class NewsletterSubscriptionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_subscriber_and_dispatches_brevo_sync_job()
    {
        Bus::fake();
        Mail::fake();

        Livewire::test(NewsletterForm::class)
            ->set('email', 'dreamer@example.com')
            ->call('subscribe')
            ->assertSet('subscribed', true);

        $this->assertDatabaseHas('subscribers', [
            'email' => 'dreamer@example.com',
            'is_subscribed' => true,
        ]);

        Bus::assertDispatched(SyncSubscriberToBrevoJob::class, function ($job) {
            return $job->email === 'dreamer@example.com';
        });
    }
}
