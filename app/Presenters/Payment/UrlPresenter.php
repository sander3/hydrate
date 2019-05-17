<?php

namespace App\Presenters\Payment;

use App\Payment;
use App\Presenters\Presenter;
use Illuminate\Support\Facades\URL;

class UrlPresenter extends Presenter
{
    protected $payment;

    /**
     * Create a new presenter instance.
     *
     * @param  \App\Payment  $payment
     * @return void
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    public function store()
    {
        return URL::temporarySignedRoute(
            'api.order.payments.store',
            now()->addDay(),
            [
                'order' => $this->payment->order,
            ]
        );
    }

    public function show()
    {
        return URL::temporarySignedRoute(
            'api.payments.show',
            now()->addDay(),
            [
                'payment' => $this->payment,
            ]
        );
    }

    public function update()
    {
        return URL::temporarySignedRoute(
            'api.payments.update',
            now()->addMinutes(20),
            [
                'payment' => $this->payment,
            ]
        );
    }
}
