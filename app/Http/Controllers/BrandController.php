<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Categorie;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function addBrandStore(Request $request){
        $data = $request->all();
        $validatedata = $request->validate([
            "name"=>"required|unique:brands",
            "categories_id"=>"required",
        ]);
        $save = Brand::create([
            "name"=>$data["name"],
            "categories_id"=> $data["categories_id"],
        ]);
        return redirect()->back()->with("addBrandSuccessful","Nouvelle marque ajoutée avec succès!!");
    }

    public function brandModify($id){
        $brands = Brand::all();
        $ids = Brand::find($id);
        $categories = Categorie::all();
        return view('gestionVoiture.marque',compact("brands","ids","categories"));
    }

    public function brandModifyStore(Request $request,$id){
        $data =$request->all();

        $brands = Brand::where('id',$id)->update([
            "name"=>$data["name"],
            'categories_id'=>$data["categories_id"],
        ]);
        return redirect()->back()->with('brandModify',"Modifications enregistrées avec succès.");
    }

    public function deleteBrand($id){

        $brands = Brand::where('id',$id)->delete();
      
        return redirect()->back()->with('brandDelete',"Marque supprimée avec succès.");
    }
}
