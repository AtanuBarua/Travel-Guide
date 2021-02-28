<?php

namespace App\Http\Controllers\Admin;

use App\Model\BusFare;
use App\Model\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BusFareController extends Controller
{
    public function addCost()
    {

        return view('admin.bus-fare.add-cost', [
            'locations' => Location::all()
        ]);

    }

    public function newCost(Request $request)
    {
        //return $request->all();


        $cost = new BusFare();

        $cost->from_location = $request->from_location;
        $cost->to_location   = $request->to_location;
        $cost->ticket_cost   = $request->ticket_cost;
        $cost->save();

        return redirect('/manage-cost')->with('message', 'Cost created successfully!!');

    }

    public function manageCost()
    {

        $costs = BusFare::all();

        /*$costs = DB::table('bus_fares')

            ->join('locations','bus_fares.from_location_id','=','locations.id')
            ->select('bus_fares.*','locations.location_name')
            ->orderBy('bus_fares.id', 'desc')
            ->get();*/

        return view('admin.bus-fare.manage-cost', [
            'costs' => $costs
        ]);
    }

    public function editCost($id)
    {

        return view('admin.bus-fare.edit-cost', [
            'cost' => BusFare::find($id)
        ]);
    }

    public function updateCost(Request $request)
    {


        $cost = BusFare::find($request->id);
        $cost->from_location = $request->from_location;
        $cost->to_location   = $request->to_location;
        $cost->ticket_cost      = $request->ticket_cost;
        $cost->save();

        return redirect('/manage-cost')->with('message', 'Cost updated successfully!!');

    }

    public function deleteCost(Request $request)
    {

        $cost = BusFare::find($request->id);
        $cost->delete();
        return redirect('/manage-cost')->with('message', 'Cost deleted successfully!!');
    }
}
