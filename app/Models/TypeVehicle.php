<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeVehicle extends Model
{
    protected $table = 'type_vehicle';
    protected $primaryKey = 'id_type_vehicle';
    protected $fillable = [
        'name_type_vehicle'
    ];
    public function vehicles(){
        return $this->belongsTo (Vehicle::class,'id_type_vehicle');
    }
}
