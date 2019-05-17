<?php

namespace App;

use App\Events\OrderCreated;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => OrderCreated::class,
    ];

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * The products that belong to the order.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot([
            'quantity',
            'unit_price',
        ]);
    }
}
