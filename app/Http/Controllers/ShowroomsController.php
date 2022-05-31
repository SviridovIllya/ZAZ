<?php

namespace App\Http\Controllers;

use App\Models\Showroom;
use Illuminate\Http\Request;

class ShowroomsController extends Controller
{

    public function show(Request $request)
    {
        $showroom = Showroom::where('id', $request->id)->with('cars.service')->first();
        $showrooms = Showroom::all();
        return view('showroom', compact('showroom', 'showrooms'));
    }

}
