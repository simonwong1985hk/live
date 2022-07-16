<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Contact extends Component
{
    // public properties are automatically available in the view
    public $name;
    public $email;
    public $message;

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
        $this->validate();
    }

    // render the view
    public function render()
    {
        return view('livewire.frontend.contact')
            ->layout('components.frontend.layout');
    }
}
