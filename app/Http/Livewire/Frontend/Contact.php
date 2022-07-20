<?php

namespace App\Http\Livewire\Frontend;

use App\Mail\ContactMail;
use App\Rules\Recaptcha;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{
    // public properties are automatically available in the view
    public $name;
    public $email;
    public $message;
    public $recaptcha;

    // event listeners
    protected $listeners = ['getToken'];

    public function getToken($token)
    {
        $this->recaptcha = $token;
    }

    // initializing properties
    public function mount()
    {
        $this->fill([
            'name' => old('name', auth()->user()?->name ?? ''),
            'email' => old('email', auth()->user()?->email ?? ''),
            'message' => old('message', ''),
        ]);
    }

    // define rules dynamically
    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'message' => 'required|string|max:255',
            'recaptcha' => ['required', new Recaptcha],
        ];
    }

    // real-time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // submit handler
    public function send()
    {
        $validated = $this->validate();

        // sending mail
        try {
            Mail::to(config('mail.from.address'))->send(new ContactMail($validated));
        } catch (\Exception $e) {
            $this->addError('failure', trans('Failed to send message.'));
            return;
        }

        // reset public property values to their initial state after mail sent
        $this->reset();

        return back()->with('success', 'Message sent successfully.');
    }

    // render the view
    public function render()
    {
        return view('livewire.frontend.contact')
            ->layout('components.frontend.layout');
    }
}
