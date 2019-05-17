<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return $category->products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        Category $category
    ) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(
        Category $category,
        Product $product
    ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        Category $category,
        Product $product
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Category $category,
        Product $product
    ) {
        //
    }
}
