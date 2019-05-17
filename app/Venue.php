<?php

namespace App;

use App\Scopes\GeolocationScope;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use GeolocationScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'latitude',
        'longitude',
        'expired_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'expired_at',
    ];

    /**
     * Get the categories for the venue.
     */
    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    /**
     * Get all of the products for the venue.
     */
    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\Category');
    }
}
