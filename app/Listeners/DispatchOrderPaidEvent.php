<?php

namespace App\Listeners;

use App\Events\OrderPaid;
use App\Events\OrderSaved;
use Illuminate\Contracts\Queue\ShouldQueue;

class DispatchOrderPaidEvent implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  OrderSaved  $event
     * @return void
     */
    public function handle(OrderSaved $event)
    {
        event(new OrderPaid($event->order));
    }

    public function shouldQueue(OrderSaved $event)
    {
        return $event->order->isOpen() && $event->order->isPaid();
    }
}
