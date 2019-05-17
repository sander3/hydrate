<?php

namespace App\Repositories;

use App\Payment;
use Mollie\Laravel\Facades\Mollie;

class PaymentRepository
{
    /**
     * Create the payment at the provider.
     *
     * @param  \App\Payment  $payment
     * @return \Mollie\Api\Resources\Payment
     */
    public function createProviderPayment(Payment $payment)
    {
        $providerPayment = Mollie::api()->payments()->create([
            'amount'      => [
                'currency' => 'EUR',
                'value'    => $payment->order->amount,
            ],
            'description' => $payment->description,
            'redirectUrl' => $this->getRedirectUrl($payment),
            'webhookUrl'  => $payment->url->update,
            'method'      => ['ideal'],
        ]);

        return $providerPayment;
    }

    /**
     * Get the client's redirect URL.
     *
     * @param  \App\Payment  $payment
     * @return string
     */
    public function getRedirectUrl(Payment $payment)
    {
        $query = http_build_query([
            'paymentStatusUrl' => $payment->url->show,
        ]);

        return config('hydrate.client_url') . '/payment?' . $query;
    }

    /**
     * Get the payment from the provider.
     *
     * @param  \App\Payment  $payment
     * @return \Mollie\Api\Resources\Payment
     */
    public function getProviderPayment(Payment $payment)
    {
        return Mollie::api()->payments()->get($payment->provider_id);
    }
}
