<?php

namespace App\Http\Controllers\Api;

use App\Order;
use App\Venue;
use Illuminate\Http\Request;
use Faker\Generator as Faker;
use App\Http\Requests\StoreOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Transformers\OrderProductTransformer;

class OrderController extends Controller
{
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
     * @param  \App\Http\Requests\StoreOrder  $request
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function store(
        Faker $faker,
        StoreOrder $request,
        Venue $venue
    ) {
        $order = $venue->orders()->make([
            'color'  => $faker->safeHexColor,
            'letter' => $faker->randomLetter,
        ]);

        if (Auth::check()) {
            $order->user()->associate($request->user());
        }

        $order->save();

        $products = OrderProductTransformer::fromInput($request->products);

        $order->products()->attach($products);

        return [
            'paymentUrl' => $order->payments()->make()->url->store,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        Order $order
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
