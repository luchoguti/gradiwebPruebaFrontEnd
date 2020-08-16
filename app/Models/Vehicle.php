<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicle';
    protected $primaryKey = 'id_vehicle';
    protected $fillable = [
      'number_license_plate','id_trademark','id_type_vehicle'
    ];
    public function typeVehicle(){
        return $this->hasMany (TypeVehicle::class,'id_type_vehicle','id_type_vehicle');
    }
    public function tradeMark(){
        return $this->hasMany (Trademark::class,'id_trademark','id_trademark');
    }
    public function vehiclesOwner()
    {
        return $this->belongsTo (VehicleOwner::class,'id_vehicle','id_vehicle');
    }
}
