<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleOwner extends Model
{
    protected $table = 'vehicle_owner';
    protected $primaryKey = 'id_vehicle_owner';
    protected $fillable = [
        'name','number_identification','id_vehicle'
    ];
    public function vehicles()
    {
        return $this->hasMany (Vehicle::class,'id_vehicle','id_vehicle')
            ->with (['typeVehicle','tradeMark']);
    }
}
