<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    /**
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function uploadImage(Request $request)
    {
        //dd($request->all());
        if ($request->hasFile('image'))
        {
                $file      = $request->file('image');
                $filename  = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture   = date('His').'-'.$filename;
                $file->move(public_path('img'), $picture);
                return response()->json(["filename" => $picture]);
        } 
        else
        {
                return response()->json(["filename" => ""]);
        }
    }
}
