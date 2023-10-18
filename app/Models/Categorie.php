<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable =["name"];
    protected  $table = "categories";

    public function categories(){
        return $this->hasMany(Brand::class,'categories_id','id');
    }
    
}
