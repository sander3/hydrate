<?php

namespace App;

use App\Events\OrderSaved;
use App\Events\OrderCreated;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUSES = [
        'created',
        'pending',
        'canceled',
        'completed',
        'expired',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => OrderCreated::class,
        'saved'   => OrderSaved::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'color',
        'letter',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'color',
        'letter',
    ];

    /**
     * Get the venue that owns the order.
     */
    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }

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

    /**
     * Get the payments for the order.
     */
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    /**
     * Get the order's amount.
     *
     * @return string
     */
    public function getAmountAttribute()
    {
        return $this->products()->sum(
            DB::raw('quantity * order_product.unit_price')
        );
    }

    /**
     * Determine if the order is open or not.
     *
     * @return bool
     */
    public function isOpen()
    {
        return $this->status === 'created';
    }

    /**
     * Determine if the order is paid or not.
     *
     * @return bool
     */
    public function isPaid()
    {
        return $this->payments()->where('status', 'paid')->exists();
    }
}
