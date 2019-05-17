<?php

namespace App\Http\Controllers\Api;

use App\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchVenueByGeolocation;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Venue::paginate();
    }

    public function search()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\SearchVenueByGeolocation  $request
     * @return \Illuminate\Http\Response
     */
    public function searchByGeolocation(SearchVenueByGeolocation $request)
    {
        return Venue::query()
            ->near($request->latitude, $request->longitude, $request->distance)
            ->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        Venue $venue
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        //
    }
}
