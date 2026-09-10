<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BrevoService
{
    protected string $apiKey;
    protected int $listId;
    protected string $baseUrl = 'https://api.brevo.com/v3';

    public function __construct()
    {
        $this->apiKey = config('services.brevo.key') ?? '';
        $this->listId = config('services.brevo.list_id') ?? 1;
    }

    /**
     * Add or update a contact in Brevo.
     */
    public function syncSubscriber(string $email, array $attributes = []): bool
    {
        if (empty($this->apiKey)) {
            Log::warning('Brevo API key is not configured in .env');
            return false;
        }

        $payload = [
            'email' => $email,
            'listIds' => [$this->listId],
            'updateEnabled' => true,
        ];

        if (!empty($attributes)) {
            $payload['attributes'] = $attributes;
        }

        $response = Http::withHeaders([
            'api-key' => $this->apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post("{$this->baseUrl}/contacts", $payload);

        if ($response->successful() || $response->status() === 204) {
            Log::info("Successfully synced subscriber {$email} to Brevo list {$this->listId}");
            return true;
        }

        Log::error("Failed to sync subscriber {$email} to Brevo: " . $response->body());
        return false;
    }
}
