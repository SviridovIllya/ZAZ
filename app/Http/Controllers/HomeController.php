<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Showroom;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Request $request) {
        $showrooms = Showroom::all();
        return view('dashboard', compact('showrooms'));
    }
}
