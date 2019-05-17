<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the venue that owns the category.
     */
    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }

    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * Set the category's name.
     *
     * @param  string  $value
     * @return void
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
}
