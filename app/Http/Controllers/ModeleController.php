<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Modele;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    //
    public function addModelStore(Request $request){
        $data = $request->all();
        $validateData = $request->validate([
            "name"=>"required|unique:models",
            "year"=>"required",
            "brands_id"=>"required",
        ]);
        $save = Modele::create([
            "name"=>$data["name"],
            "year"=>$data["year"],
            "brands_id"=>$data["brands_id"],
        ]);
        return redirect()->back()->with("modelAdd","Nouveau model enregistré avec succès");
    }
    public function deleteModel($id){
        $models = Modele::where('id',$id)->delete();
        return redirect()->back()->with('modelDelete',"Model supprimé avec succès");
    }

    public function modelModify($id){
        $brands = Brand::all();
        $ids = Modele::find($id);
        $models =Modele::all();

        return view('gestionVoiture.modele',compact("brands","ids","models"));
        
    }

    public function modelModifyStore(Request $request , $id){

        $data = $request->all();
        $save = Modele::where('id',$id)->update([
            "name"=>$data["name"],
            "year"=>$data["year"],
            "brands_id"=>$data["brands_id"],
        ]);


       return redirect()->back()->with("updateModelSuccess","les modifications ont été bien enregistrées");
        
    }
}
