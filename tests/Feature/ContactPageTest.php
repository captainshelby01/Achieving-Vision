<?php

namespace Tests\Feature;

use App\Livewire\ContactForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ContactPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_renders_the_contact_page_successfully(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200)
                 ->assertSee("Let's Start a Conversation", false)
                 ->assertSee('Send a Direct Inquiry')
                 ->assertSee('contact@achievingvision.com');
    }

    public function test_it_submits_contact_form_successfully(): void
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'John Builder')
            ->set('email', 'john@example.com')
            ->set('subject_type', 'speaking')
            ->set('message', 'We would love to invite Oghale to speak at our annual conference.')
            ->call('submit')
            ->assertHasNoErrors()
            ->assertSet('submitted', true)
            ->assertSee('Thank You for Reaching Out');
    }

    public function test_it_rejects_contact_inquiries_with_em_dashes(): void
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'John Builder')
            ->set('email', 'john@example.com')
            ->set('subject_type', 'general')
            ->set('message', 'This message has an em dash — which is against the brand voice.')
            ->call('submit')
            ->assertHasErrors(['message'])
            ->assertSet('submitted', false);
    }
}