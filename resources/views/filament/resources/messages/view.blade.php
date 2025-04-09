<div>
    <h2 class="text-xl font-semibold">Dettagli del Messaggio</h2>
    
    <div class="mt-4">
        <p><strong>Nome:</strong> {{ $message->nome }}</p>
        <p><strong>Cognome:</strong> {{ $message->cognome }}</p>
        <p><strong>Email:</strong> {{ $message->email }}</p>
        <p><strong>Telefono:</strong> {{ $message->telefono }}</p>
        <p><strong>Messaggio:</strong></p>
        <p>{{ $message->messaggio }}</p>
    </div>
</div>
