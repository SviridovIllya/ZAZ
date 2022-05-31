<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Service;
use App\Models\Showroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarsController extends Controller
{


    public function service(Request $request)
    {
        $car = Car::where('id', $request->car_id)->first();
        $service = Service::where('car_id', $car->id)->first();
        if(!empty($car->customer_id) && $car->customer_id == Auth::id() && !empty($service))
            $service->delete();
        elseif (!empty($car->customer_id) && $car->customer_id){
            $service = new Service;
            $service->car_id = $car->id;
            $service->showroom_id = $car->showroom_id;
            $service->save();
        }
        $showroom = Showroom::where('id', $car->showroom_id)->with('cars.service')->first();
        return ['cars' => $showroom->cars];
    }

    public function update(Request $request)
    {
        $car = Car::where('id', $request->car_id)->first();
        if(empty($car->customer_id))
            $car->update(array('customer_id' => Auth::id()));
        elseif($car->customer_id == Auth::id())
            $car->update(array('customer_id' => null));
        $showroom = Showroom::where('id', $car->showroom_id)->with('cars')->first();
        return ['cars' => $showroom->cars];
    }
}
