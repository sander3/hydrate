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
}
