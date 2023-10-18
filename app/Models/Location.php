<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['customers_id', 'cars_id', 'startDate', 'expectedReturnDate', 'effectiveReturnDate', 'observation'];

    protected $table = "locations";

    protected $with = ["customer", "car"];

   /*  protected static function booted()
    {
        static::saving(function($location){
            $location->isDelayed();
        });
    } */

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id', 'id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'cars_id', 'id');
    }

   /*  public function getExpectdateAttribute(){
        $date1 = Carbon::createFromFormat('Y-m-d H', $this->attributes['expectedReturnDate'])->toDateTimeString();
        return $date1;
    }

    public function getRealdateAttribute(){
        $date2 = Carbon::createFromFormat('Y-m-d H', $this->attributes['effectiveReturnDate'])->toDateTimeString();
        return $date2;
    } */

    /* public function getTimeRespectedAttribute()
    {

        $locations = location::all();


        foreach ($locations  as  $location) {
            

        $date1 = Carbon::createFromFormat('m/d/Y H:i:s',$location->expectedReturnDate);
        $date2 = Carbon::createFromFormat('m/d/Y H:i:s',$location->effectiveReturnDate);
        if($date2 )
        if($result = $date2->gt($date1)){
            $deadlineMet = "le délai n'a pas été respecté";
        }
        if($result = $date1->gte($date2)){
            $deadlineMet = "le délai a été respecté";
        }
        return $result;
    }
} */

public static function getTimeAttribute($id)
{
    $location = Location::where('id',$id)->get()->toArray();
    if ($location['0']['effectiveReturnDate'] !=  null)  {
        if($location['0']['expectedReturnDate'] >= $location['0']['effectiveReturnDate']){
            return 'le délai a été respecté ';
        }
        else{
            return "le délai n'a pas été respecté";
        }
    }
    else{
        return '';
    }
}
}