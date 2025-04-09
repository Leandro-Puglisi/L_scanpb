<?php

namespace App\Filament\Widgets;

use App\Models\Message;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget;
use Illuminate\Support\Carbon;

class MessagesStats extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        $lastMessage = Message::latest('created_at')->first();

        return [
            Card::make('Messaggi totali', Message::count())
                ->icon('heroicon-o-chat-bubble-left-right')
                ->color('primary'),

            Card::make('Messaggi oggi', Message::whereDate('created_at', Carbon::today())->count())
                ->description('Ricevuti nelle ultime 24h')
                ->color('success'),

            Card::make('Non letti', Message::where('is_read', false)->count())
                ->description('Ancora da leggere')
                ->color('danger'),

            Card::make(
                'Ultimo messaggio ricevuto',
                $lastMessage
                    ? $lastMessage->created_at->format('d M Y \a\l\l\e H:i')
                    : 'Nessun messaggio'
            )
            ->description('Data e ora dell\'ultimo messaggio')
            ->icon('heroicon-o-clock')
            ->color('gray'),
        ];
    }
}
