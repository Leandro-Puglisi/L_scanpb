    <form wire:submit.prevent="submit" class="php-email-form">
        
        <h3>Richiedi un Preventivo</h3>
        <p>Lasciaci un messaggio e saremo lieti di ricontattarti.</p>
        <div class="row gy-3">

            <div class="col-12">
                <input type="text" wire:model.defer="nome" class="form-control" placeholder="Il tuo nome" required="">
                @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-12">
                <input type="text" wire:model.defer="cognome" class="form-control" placeholder="Il tuo cognome" required="">
                @error('cognome') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-12">
                <input type="email" wire:model.defer="email" class="form-control" placeholder="La tua email" required="">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-12">
                <input type="text" wire:model.defer="telefono" class="form-control" placeholder="Il tuo telefono" required="">
                @error('telefono') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-12">
                <textarea wire:model.defer="messaggio" class="form-control" rows="6" placeholder="Scrivi qua come possiamo esserti di aiuto!" required=""></textarea>
                @error('messaggio') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-12 text-center">
                <div wire:loading class="loading">Stiamo Inviando il tuo messaggio..</div>
                <div class="error-message" wire:loading.remove></div>
                <div wire:loading.remove>
                    @if ($messageSent)
                        <div class="sent-message">
                            Caricamento avvenuto con successo!
                        </div>
                    @endif
                </div>
                <button type="submit" wire:loading.attr="disabled">Invia Messaggio</button>
            </div>

        </div>
    </form>

