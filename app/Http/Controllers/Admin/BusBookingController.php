<?php

namespace App\Http\Controllers\Admin;

use App\Model\BusBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusBookingController extends Controller
{
    public function manageBooking()
    {

        $bookings = BusBooking::all();

        /*$costs = DB::table('bus_fares')

            ->join('locations','bus_fares.from_location_id','=','locations.id')
            ->select('bus_fares.*','locations.location_name')
            ->orderBy('bus_fares.id', 'desc')
            ->get();*/

        return view('admin.bus-booking.manage-booking', [
            'bookings' => $bookings
        ]);
    }
}
