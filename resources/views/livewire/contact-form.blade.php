
    <form wire:submit.prevent="submit" class="php-email-form">
        
        <h3>Richiedi un Preventivo</h3>
        <p>Vel nobis odio laboriosam et hic voluptatem. Inventore vitae totam. Rerum repellendus enim linead sero park flows.</p>
        <div class="row gy-3">

            <div class="col-12">
                <input type="text" wire:model.defer="nome" class="form-control" placeholder="nome" required="">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-12">
                <input type="text" wire:model.defer="cognome" class="form-control" placeholder="cognome" required="">
                @error('cognome') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-12">
                <input type="email" wire:model.defer="email" class="form-control" placeholder="email" required="">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-12">
                <input type="text" wire:model.defer="telefono" class="form-control" placeholder="telefono" required="">
                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-12">
                <textarea wire:model.defer="messaggio" class="form-control" rows="6" placeholder="messaggio" required=""></textarea>
                @error('message') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-12 text-center">
                <div wire:loading class="loading">Loading...</div>
                <div class="error-message" wire:loading.remove></div>
                <div class="sent-message" wire:loading.remove wire:target="submit">Your quote request has been sent successfully. Thank you!</div>

                <button type="submit" wire:loading.attr="disabled">Get a quote</button>
            </div>

        </div>
    </form>

