<?php

namespace App\Http\Controllers\Admin;

use App\Model\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.home.index');
    }


    public function addLocation()
    {

        return view('admin.location.add-location', [
            'categories' => Location::all()
        ]);

    }

    public function newLocation(Request $request)
    {
        //return $request->all();


        $location = new Location();

        $location->location_name = $request->location_name;
        $location->save();

        return redirect('/add-location')->with('message', 'Location created successfully!!');


    }

    public function manageLocation()
    {

        $locations = Location::all();

        return view('admin.location.manage-location', [
            'locations' => $locations
        ]);
    }

    public function editLocation($id)
    {

        return view('admin.location.edit-location', [
            'location' => Location::find($id)
        ]);
    }

    public function updateLocation(Request $request)
    {


        $location = Location::find($request->id);
        $location->location_name = $request->location_name;
        $location->save();

        return redirect('/manage-location')->with('message', 'Locations updated successfully!!');

    }

    public function deleteLocation(Request $request)
    {

        $location = Location::find($request->id);
        $location->delete();
        return redirect('/manage-location')->with('message', 'Location deleted successfully!!');
    }
}
