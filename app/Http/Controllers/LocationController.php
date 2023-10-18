<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function locationHome()
    {
        $locations = location::paginate(5);
        $cars = Car::all();

        return view('locationVoiture.locationHome', compact('cars', 'locations'));
    }
    public function addLocation()
    {
        $customers = Customer::all();
        $cars = Car::all();

        return view('locationVoiture.addLocation', compact('customers', 'cars'));
    }

    public function carLocationStore(Request $request)
    {
        $location = $request->all();
        

        $validateData = $request->validate([
            "cars_id" => "required",
            "customers_id" => "required",
            "startDate" => "required",
            "expectedReturnDate" => "required",
        ]);


        $save = Location::updateOrCreate([
            "cars_id" => $location["cars_id"],
            "customers_id" => $location["customers_id"],
            "startDate" => $location["startDate"],
            "expectedReturnDate" => $location["expectedReturnDate"],
        ]);
        return redirect()->route('locationHome')->with("addLocationSuccess", "location enregistrée avec succès");
    }

    public function modifyLocation($id)
    {

        $customers = Customer::all();
        $cars = car::all();
        $location = Location::find($id);
        $locations = Location::all();

        return view('locationVoiture.addLocation', compact('location', "customers", "cars"));
    }

    public function modifyLocationStore($id, Request $request)
    {
        $location = $request->all();
        /* if($location["observation"] == ""){
            $locationObservation = $location["observation"];
            
        } */
        $save = Location::where('id', $id)->update([
            "cars_id" => $location["cars_id"],
            "customers_id" => $location["customers_id"],
            "startDate" => $location["startDate"],
            "expectedReturnDate" => $location["expectedReturnDate"],
            "effectiveReturnDate" => $location["effectiveReturnDate"],
            "observation" => $location["observation"],
        ]);
        return redirect()->route('locationHome')->with("modifyLocationSuccess", "location enregistrée avec succès");
    }


    public function locationSeeMore($id, Request $request)
    {
        $params = $request->request;

        $index = $request->input('photo_index', 0);

        //$collection = Car::find($id);

        $location = Location::find($id);

        $photos = $location->car->photo;


        return view('locationVoiture.locationSeeMore', compact("index","location","photos"));
    }

    public function locationDelete($id)
    {
        $location = Location::where('id', $id)->delete();
        return redirect()->back()->with('locationDeleteSuccess', "location supprimée avec succès.");
    }

}
