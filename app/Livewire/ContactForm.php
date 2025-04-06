<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;

class ContactForm extends Component
{
    public $nome, $cognome, $email, $telefono,$messaggio;

    protected $rules = [
    'nome' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
    'cognome' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
    'email' => 'required|email:rfc,dns',
    'telefono' => 'required|string|max:20|regex:/^[0-9+\s()-]+$/',
    'messaggio' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        Message::create([
            'nome' => $this->nome,
            'cognome' => $this->cognome,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'messaggio' => $this->messaggio,
        ]);

        session()->flash('success', 'Messaggio inviato con successo!');
        $this->reset(); // resetta i campi
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
