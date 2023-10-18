<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Modele;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //
    public function addCarStore(Request $request)
    {

        $data = $request->all();

        $photo = $request->photo;

        $validaData = $request->validate([
            "photo" => "required",
            "models_id" => "required",
            "transmission" => "required",
            "color" => "required",
            "maxspeed" => "required",
            "carbody" => "required",
            "brake" => "required",
            "gearbox" => "required",
            "power" => "required",
            "door" => "required",
            "fuel" => "required",
            "cylinder" => "required",
            "valve" => "required",
            "acceleration" => "required",
        ]);


        $photos = [];
        $images = $request->photo;
        foreach ($images as $image) {
            $path = $image->store("carImage"); // Stockez le fichier dans le répertoire "carImages"
            array_push($photos, $path); // Stockez le chemin complet dans le tableau $photos
        }
        $save = Car::updateOrCreate([
            "models_id" => $data["models_id"],
            "transmission" => $data["transmission"],
            "color" => $data["color"],
            "maxspeed" => $data["maxspeed"],
            "carbody" => $data["carbody"],
            "brake" => $data["brake"],
            "gearbox" => $data["gearbox"],
            "power" => $data["power"],
            "door" => $data["door"],
            "fuel" => $data["fuel"],
            "cylinder" => $data["cylinder"],
            "valve" => $data["valve"],
            "acceleration" => $data["acceleration"],
            "photo" => $photos,

        ]);
        return redirect()->route('gestionVoiture')->with('SuccessMessage', "Nouvelle voiture ajoutée avec succès.");
    }

    public function deleteCar($id)
    {
        $cars = Car::where('id', $id)->delete();
        return redirect()->back()->with('deletecarSuccess', 'Voiture supprimée avec succès.');
    }

    public function carModify($id)
    {
        $models = Modele::all();
        $car = Car::find($id);

        $photos = $car->photo;

        return view('gestionVoiture.addVoiture', compact('car', 'models', 'photos'));
    }

    public function modifyCarStore(Request $request, $id)
    {
        $data = $request->all();
        $validateData = $request->validate([
            "photo" => "required",
            "models_id" => "required",
            "transmission" => "required",
            "color" => "required",
            "maxspeed" => array([
                "required",
                "regex:/^(?=.*[0-9])/"
            ]),
            "carbody" => "required",
            "brake" => "required",
            "gearbox" => "required",
            "power" => array([
                "required",
                "regex:/^(?=.*[0-9])/"
            ]),
            "door" =>  array([
                "required",
                "regex:/^(?=.*[0-9])/"
            ]),
            "fuel" => "required",
            "cylinder" => array([
                "required",
                "regex:/^(?=.*[0-9])/"
            ]),
            "valve" =>  array([
                "required",
                "regex:/^(?=.*[0-9])/"
            ]),
            "acceleration" =>  array([
                "required",
                "regex:/^(?=.*[0-9])/"
            ]),
        ]);
        $photos = [];
        $images = $request->photo;
        foreach ($images as $image) {

            $path = $image->store("carImage");
            array_push($photos, $path);
        }

        $save = Car::where('id', $id)->update([


            "models_id" => $data["models_id"],
            "transmission" => $data["transmission"],
            "color" => $data["color"],
            "maxspeed" => $data["maxspeed"],
            "carbody" => $data["carbody"],
            "brake" => $data["brake"],
            "gearbox" => $data["gearbox"],
            "power" => $data["power"],
            "door" => $data["door"],
            "fuel" => $data["fuel"],
            "cylinder" => $data["cylinder"],
            "valve" => $data["valve"],
            "acceleration" => $data["acceleration"],
            "photo" => $photos,


        ]);

        return redirect()->route('gestionVoiture')->with('updateCar', 'Modifications enregistrées avec succès.');
    }
    public function carSeeMore($id, Request $request)

    {
        $params = $request->request;
       
        $index = $request->input('photo_index',0);

        $collection = Car::find($id);

        $photos =  $collection->photo;


       
        return view('gestionVoiture.seeMore', compact('collection', "photos","index"));
    }
    
}
