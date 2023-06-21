<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Models\BusinessPartners;
use App\Models\Film;
use App\Models\Reviews;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerValues = Customer::select('customer_id', 'first_name', 'last_name', 'email', 'active')->orderBy("customer_id", "desc")->limit(10)->get();
        $customerKeys = array_keys(json_decode($customerValues, true)[1]);
        $topMoviesValues = Film::select('film_id', 'title', 'release_year', 'rating')->orderBy("length", "desc")->limit(10)->get();
        $topMoviesKeys = array_keys(json_decode($topMoviesValues, true)[1]);
        $businessValues = BusinessPartners::limit(10)->get();
        $businessKeys = array_keys(json_decode($businessValues, true)[1]);
        $reviews = Reviews::orderBy("review_id", "desc")->limit(10)->get();
        $reviewsKeys = array_keys(json_decode($reviews, true)[1]);

        // echo "<pre>";
        // print_r(json_encode($customerValues));
        // print_r($customerKeys);
        // foreach ($vars as $key => $value) {
        //     var_dump($key);
        //     var_dump($value);
        // }

        return view("index")->with([
            "customerValues" => $customerValues,
            "customerKeys" => $customerKeys,
            "businessValues" => $businessValues,
            "businessKeys" => $businessKeys,
            "reviewValues" => $reviews,
            "reviewsKeys" => $reviewsKeys,
            "topMoviesValues" => $topMoviesValues,
            "topMoviesKeys" => $topMoviesKeys,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
