<?php

namespace App\Listeners;

use App\Events\OrderPaid;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogPaidOrder implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  OrderPaid  $event
     * @return void
     */
    public function handle(OrderPaid $event)
    {
        Log::info('Order paid.', [
            'id' => $event->order->id,
        ]);
    }
}
