<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use Illuminate\Support\Facades\Http;

class ContactForm extends Component
{
    public $nome, $cognome, $email, $telefono,$messaggio;
    public $messageSent = false;

    protected $rules = [
    'nome' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
    'cognome' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
    'email' => 'required|email:rfc,dns',
    'telefono' => 'required|string|max:20|regex:/^[0-9+\s()-]+$/',
    'messaggio' => 'required|string',
    
    ];
    protected $messages = [ 
        'nome.required' => 'Il campo nome è obbligatorio.',
        'nome.regex' => 'Il nome può contenere solo lettere, spazi e trattini.',
        
        'cognome.required' => 'Il campo cognome è obbligatorio.',
        'cognome.regex' => 'Il cognome può contenere solo lettere, spazi e trattini.',
        
        'email.required' => 'Inserisci la tua email.',
        'email.email' => 'L\'email inserita non è valida.',
        
        'telefono.required' => 'Il numero di telefono è obbligatorio.',
        'telefono.regex' => 'Il numero di telefono può contenere solo numeri, spazi, parentesi e simboli come + o -.',
        
        'messaggio.required' => 'Scrivi un messaggio.',
        
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

        $this->messageSent = true;
        session()->flash('success', 'Messaggio inviato con successo!');
        $this->reset(); // resetta i campi
        $this->messageSent = true;

    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}