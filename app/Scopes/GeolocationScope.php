<?php

namespace App\Scopes;

trait GeolocationScope
{
    /**
     * Scope a query to only include models nearby the given geolocation.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $latitude
     * @param  string  $longitude
     * @param  int  $distance  Distance in meters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNear(
        $query,
        string $latitude,
        string $longitude,
        int $distance = 10000
    ) {
        return $query->whereRaw('
            ST_Distance_Sphere(
                point(longitude, latitude),
                point(?, ?)
            ) <= ?
        ', [
            $longitude,
            $latitude,
            $distance,
        ]);
    }
}
