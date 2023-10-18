<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Modele;
use App\Models\Categorie;
use Illuminate\Http\Request;

class GestionVoitureController extends Controller
{
    public function gestionVoiture(){ 
   
       // $cars = Car::all();
        $brands = Brand::all();
        $models = Modele::all();
        $cars = Car::paginate(5);
        return view('gestionVoiture.gestionVoitureHome',compact("cars","models","brands"));
    }
    public function marqueVoiture(){ 
        $categories = Categorie::all();
        $brands = Brand::all();
        return view('gestionVoiture.marque',compact("brands","categories"));
    }
    public function modeleVoiture(){ 
       $brands = Brand::all();
       $models = Modele::all();
        return view('gestionVoiture.modele',compact("brands","models"));
    }
    public function categorieVoiture(){ 
        $categories = Categorie::all();
        return view('gestionVoiture.categorie',compact('categories'));
    }
    public function addVoiture(){ 
        $models = Modele::all();
        return view('gestionVoiture.addVoiture',compact("models"));
    }
}
