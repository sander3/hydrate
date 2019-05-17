<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\Payment\UrlPresenter;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider_id',
        'status',
    ];

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['order'];

    /**
     * Get the order that owns the payment.
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    /**
     * Get the payment's description.
     *
     * @return string
     */
    public function getDescriptionAttribute()
    {
        return vsprintf('%s-%s-%s', [
            $this->order->venue->id,
            $this->order->id,
            $this->id,
        ]);
    }

    /**
     * Get the payment's URL presenter.
     *
     * @return \App\Presenters\Payment\UrlPresenter
     */
    public function getUrlAttribute()
    {
        return new UrlPresenter($this);
    }

    /**
     * Determine if the payment is paid or not.
     *
     * @return bool
     */
    public function isPaid()
    {
        return $this->status === 'paid';
    }
}
