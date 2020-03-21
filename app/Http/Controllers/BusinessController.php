<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;

class BusinessController extends Controller
{
    /**
     * Create a new BusinessController instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function getClientBusinesses($clientId)
    {
        $businesses = Business::where('client_id', $clientId)->get();
        return response()->json($businesses);
    }

    public function show($id)
    {
        $business = Business::find($id);
        return response()->json($business);
    }

    public function store(Request $request)
    {
        $client = Business::create($request->all());
        return response()->json($request->all(), 201);
    }

    public function delete(Request $request, $id)
    {
        $business = Business::findOrFail($id);
        $business->delete();

        return 204;
    }

    public function update(Request $request, $id)
    {
        $business = Business::findOrFail($id);
        $business->update($request->all());

        return $business;
    }
}
