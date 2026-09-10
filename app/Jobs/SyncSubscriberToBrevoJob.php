<?php

namespace App\Jobs;

use App\Services\BrevoService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncSubscriberToBrevoJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public string $email;
    public array $attributes;

    /**
     * Create a new job instance.
     */
    public function __construct(string $email, array $attributes = [])
    {
        $this->email = $email;
        $this->attributes = $attributes;
    }

    /**
     * Execute the job.
     */
    public function handle(BrevoService $brevoService): void
    {
        $brevoService->syncSubscriber($this->email, $this->attributes);
    }
}
