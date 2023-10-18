<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    
    use HasFactory;
    protected $table = "models";
    protected $fillable = ["name","year","brands_id"];

    protected $with = ["brand"];

    public function models(){
        return $this->hasMany(Car::class,'models_id','id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class,'brands_id','id');
    }
}
