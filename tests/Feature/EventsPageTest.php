<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventsPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_renders_the_events_page_and_displays_upcoming_events(): void
    {
        Event::create([
            'title' => 'Achieving Vision Live Masterclass',
            'description' => 'A practical interactive session on daily execution.',
            'event_date' => now()->addDays(14),
            'location' => 'Online Webinar',
            'is_featured' => true,
        ]);

        $response = $this->get('/events');

        $response->assertStatus(200)
                 ->assertSee('Speaking Engagements & Live Events', false)
                 ->assertSeeText('Achieving Vision Live Masterclass')
                 ->assertSeeText('Online Webinar')
                 ->assertSeeText('Invite Oghale to Speak at Your Event');
    }
}
