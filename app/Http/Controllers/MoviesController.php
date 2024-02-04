<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all for default
        return response()->json(Movies::all());
    }

    public function show(Request $request,$id)
    {
        //
        return response()->json(Movies::where('id',$id)->first());

    }
    public function popularity(){
        //
        
        $data = Movies::where('homepage','!=',null)->where('homepage','!=','')->where('homepage','!=','/n')->where('homepage','!=','/t')->where('homepage','!=','/r')->orderBy('popularity')->get();
        return view('home',['data' => $data,'count' => 0]);
    }
}
