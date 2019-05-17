<?php

namespace App\Http\Controllers\Api;

use App\Order;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PaymentRepository;

class PaymentController extends Controller
{
    /**
     * The payment repository instance.
     */
    protected $payments;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\PaymentRepository  $payments
     * @return void
     */
    public function __construct(PaymentRepository $payments)
    {
        $this->payments = $payments;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        Order $order
    ) {
        $payment = $order->payments()->create();

        $providerPayment = $this->payments->createProviderPayment($payment);

        $payment->update([
            'provider_id' => $providerPayment->id,
        ]);

        return [
            'checkoutUrl' => $providerPayment->getCheckoutUrl(),
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        $payment->load('order');

        if ($payment->isPaid()) {
            $payment->order->makeVisible(['color', 'letter']);
        }

        return $payment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        Payment $payment
    ) {
        $providerPayment = $this->payments->getProviderPayment($payment);

        $payment->update([
            'status' => $providerPayment->status,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
