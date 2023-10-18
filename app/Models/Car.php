<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = "cars";
    protected $fillable = ["name", "gearbox", "power", "door", "fuel", "cylinder", "valve", "maxspeed", "carbody", "transmission", "brake", "acceleration", "color", "photo", "models_id"];
    protected $with = [
        "model"
    ];
    protected $casts = [
        "photo" => "array",
    ];

    public function model()
    {
        return $this->belongsTo(Modele::class, 'models_id', 'id');
    }
    public function getCarnameAttribute()
    {
        if ($this->models_id) {
          
            $brands = Brand::all();
            $models = Modele::all();

          

                $carYear = $this->model->year;
                $modelName = $this->model->name;
                /*$firstModelLetter = substr($modelName, 0, 1); */
                $marqueName = $this->model->brand->name;
                /* $firstMarqueLetter = substr($marqueName, 0, 1); */
                $carName = $marqueName .' '.$modelName;

                return   $carName;
           
        }
    }

    public function getFullnameAttribute(){
        $cars = Car::all();
        $brands = Brand::all();
        $models = Modele::all();
       
            $nameModel = $this->model->name;
            $nameCategorie = $this->model->brand->categorie->name;
            $year = $this->model->year;
            $nameBrand = $this->model->brand->name;

            $fullName = $nameBrand.'_'.$nameModel.'_'.$year;
      

        return $fullName;
    }
}
