<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable =["name","categories_id"];
    protected $table = "brands";
    protected $with =["categorie"];

    public function brands(){
        return $this->hasMany(Modele::class,'brands_id','id');
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class,'categories_id','id');
    }
}
