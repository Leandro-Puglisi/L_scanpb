<form wire:submit.prevent="submitForm" class="php-email-form" id="myForm">
    <h3>Richiedi un Preventivo</h3>
    <p>Lasciaci un messaggio e saremo lieti di ricontattarti.</p>
    <div class="row gy-3">

        <div class="col-12">
            <input type="text" wire:model.defer="nome" name="nome" class="form-control" placeholder="Il tuo nome" required="">
            @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-12">
            <input type="text" wire:model.defer="cognome" name="cognome" class="form-control" placeholder="Il tuo cognome" required="">
            @error('cognome') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-12">
            <input type="email" wire:model.defer="email" name="email" class="form-control" placeholder="La tua email" required="">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-12">
            <input type="text" wire:model.defer="telefono" name="telefono" class="form-control" placeholder="Il tuo telefono" required="">
            @error('telefono') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-12">
            <textarea wire:model.defer="messaggio" name="messaggio" class="form-control" rows="6" placeholder="Scrivi qua come possiamo esserti di aiuto!" required=""></textarea>
            @error('messaggio') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-12 text-center">
            <div wire:loading class="loading">Stiamo Inviando il tuo messaggio..</div>
            <div class="error-message" wire:loading.remove></div>
            <div wire:loading.remove>
                @if ($messageSent)
                    <div class="sent-message">Caricamento avvenuto con successo!</div>
                @endif
            </div>
            <input type="hidden" wire:model.defer="recaptchaToken">
            @error('recaptchaToken') <small class="text-danger">{{ $message }}</small> @enderror
            
            <button type="submit" id="submitBtn">Invia Messaggio</button>
            
            
        </div>
        <small class="recaptcha-notice" style="display: block; margin-top: 10px; font-size: 12px; color: #555;">
            Questo sito è protetto da reCAPTCHA e si applicano la
            <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Privacy Policy</a> e i
            <a href="https://policies.google.com/terms" target="_blank" rel="noopener">Termini di Servizio</a> di Google.
        </small>

    </div>
</form>
@push('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
<script>
    console.log('ciasssso');
    document.addEventListener('DOMContentLoaded', function () {
        console.log("ciao");
        const submitBtn = document.getElementById('submitBtn');

        if (submitBtn) {
            submitBtn.addEventListener('click', async function (e) {
                e.preventDefault(); // blocca il submit Livewire temporaneamente

                try {
                    const token = await grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', { action: 'contact_form' });

                    // Ottieni l'istanza Livewire
                    const componentId = document.querySelector('[wire\\:id]')?.getAttribute('wire:id');
                    const component = Livewire.find(componentId);

                    if (component) {
                        component.set('recaptchaToken', token);

                        // Ora invia il form manualmente
                        component.call('submitForm');
                    } else {
                        console.error('Componente Livewire non trovato');
                    }
                } catch (error) {
                    console.error('Errore reCAPTCHA:', error);
                }
            });
        }
    });
</script>
@endpush









