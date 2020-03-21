<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ClientController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function index()
    {
        $clients = User::where('role', 1)->get();
        return response()->json($clients);
    }
    
    public function show($id)
    {
        $client = User::find($id);
        return response()->json($client);
    }

    // public function store(Request $request)
    // {
    //     $client = User::create($request->all());
    //     return response()->json($request->all(), 201);
    // }

    public function delete(Request $request, $id)
    {
        $client = User::findOrFail($id);
        $client->delete();

        return 204;
    }

    public function update(Request $request, $id)
    {
        $client = User::findOrFail($id);
        $client->update($request->all());

        return $client;
    }
}
