<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DeliverController extends Controller
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
        $delivers = User::where('role', 2)->get();
        return response()->json($delivers);
    }

    public function show($id)
    {
        $deliver = User::find($id);
        return response()->json($deliver);
    }

    // public function store(Request $request)
    // {
    //     $deliver = User::create($request->all());
    //     return response()->json($request->all(), 201);
    // }

    public function delete(Request $request, $id)
    {
        $deliver = User::findOrFail($id);
        $deliver->delete();

        return 204;
    }

    public function update(Request $request, $id)
    {
        $deliver = User::findOrFail($id);
        $deliver->update($request->all());

        return $deliver;
    }
}
