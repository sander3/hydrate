<?php

namespace App\Http\Controllers\Api;

use App\Venue;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function index(Venue $venue)
    {
        return $venue->categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        Venue $venue
    ) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venue  $venue
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(
        Venue $venue,
        Category $category
    ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venue  $venue
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        Venue $venue,
        Category $category
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venue  $venue
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Venue $venue,
        Category $category
    ) {
        //
    }
}
