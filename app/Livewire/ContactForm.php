<?php

namespace App\Livewire;

use App\Rules\NoEmDashesRule;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ContactForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $subject_type = 'general';
    public string $message = '';
    public bool $submitted = false;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:100', new NoEmDashesRule()],
            'email' => ['required', 'email', 'max:255'],
            'subject_type' => ['required', 'in:general,speaking,books,press'],
            'message' => ['required', 'string', 'min:10', 'max:2000', new NoEmDashesRule()],
        ];
    }

    protected $messages = [
        'name.required' => 'Please provide your full name.',
        'email.required' => 'Please provide your email address.',
        'email.email' => 'Please enter a valid email address.',
        'subject_type.required' => 'Please select the purpose of your inquiry.',
        'message.required' => 'Please share your message or details with us.',
        'message.min' => 'Your message must be at least 10 characters long.',
    ];

    public function submit(): void
    {
        $this->validate();

        // Log inquiry for processing / notification
        Log::info('New contact inquiry received', [
            'name' => $this->name,
            'email' => $this->email,
            'subject_type' => $this->subject_type,
            'message_length' => strlen($this->message),
        ]);

        $this->submitted = true;
        $this->reset(['name', 'email', 'message']);
    }

    public function resetForm(): void
    {
        $this->submitted = false;
        $this->reset(['name', 'email', 'message', 'subject_type']);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}