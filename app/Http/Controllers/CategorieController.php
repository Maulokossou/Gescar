<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
    public function categoryStore(Request $request){
        $data = $request->all();
        $validateData = $request->validate([
            "name"=>"required|unique:categories",
        ]);
        $save = Categorie::create([
            "name"=>$data["name"],
        ]);
        return redirect()->back()->with('addCategorySuccess','Nouvelle categorie ajoutée avec succès!!!');
    }
    public function categoryModify ($id){ 
        $categories = Categorie::all();
        $ids = Categorie::find($id);
        return view('gestionVoiture.categorie',compact('categories','ids'));
    }
    public function categoryModifyStore(Request $request,$id){
        $data = $request->all();
        $save = Categorie::where('id',$id)->update([
            "name"=>$data["name"],
        ]);
        return redirect()->back()->with("categoryUpdate","Modifications enregistrées avec succès.");
    }
    public function deleteCategory($id){
        $categories = Categorie::where('id',$id)->delete();
        return redirect()->back()->with('categoryDelete',"Catégorie supprimée avec succès");
    }
}
