<?php

namespace App\Http\Controllers\Front;

use App\Model\BusBooking;
use App\Model\BusFare;
use App\Model\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

        $locations = Location::all();
        return view('front.home.index',compact('locations'));
    }

    public function newBooking(Request $request)
    {
        //return $request->all();


        $cost = new BusBooking();

        $cost->from_location  = $request->from_location;
        $cost->to_location    = $request->to_location;



        $fare = BusFare::where('from_location',$cost->from_location)
                        ->orWhere('from_location',$cost->to_location)
                        ->where('to_location',$cost->to_location)
                        ->orWhere('to_location',$cost->from_location)
                        ->first();

        //return $cost;
        $ticketCost           = $fare->ticket_cost;
        $cost->bus_fare_id    = $fare->id;

        $passengers           = $request->passengers;

        $cost->passengers     = $passengers;
        $totalCost = $ticketCost * $passengers;
        $cost->total_cost     = $totalCost;
        $cost->departure_date = str_replace("-","/",$request->departure_date);

        $cost->save();

        return redirect('/')->with('message', 'Cost created successfully!!');

    }
}
