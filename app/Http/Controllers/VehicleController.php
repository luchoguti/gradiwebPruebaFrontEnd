<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Collection\Collection;

/**
 * Class VehicleController
 * @package App\Http\Controllers
 */
class VehicleController extends Controller
{
    /**
     * @param $number_license_plate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Http\JsonResponse
     */
    public function searchVehicleForPlate($number_license_plate)
    {
        $vehicleData = Vehicle::with (['typeVehicle','tradeMark'])
            ->where ('number_license_plate','=',$number_license_plate);
        if($vehicleData->count ()!=0){
            return $vehicleData->paginate ('5');
        }else{
            return response()->json([], 201);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $vehicle = new Vehicle();
        $vehicle->number_license_plate = $request->number_license_plate;
        $vehicle->id_trademark = $request->trademark;
        $vehicle->id_type_vehicle = $request->type;
        $vehicle->save();
        $id_vehicle=$vehicle->id_vehicle;
        $error = ["message"=>"an error occurred while storing try again"];
        if ($id_vehicle){
            $request->request->add (['id_vehicle' => $id_vehicle]);
            $vehicle_owner = $this->saveVehicleOwner ($request);
            if(!$vehicle_owner){
                return response()->json($error, 500);
            }else{
                $success = [
                    "message"=>"Registered successfully created",
                    "id_vehicle"=>$id_vehicle,
                    "id_vehicle_owner"=> $vehicle_owner
                ];
                return response()->json($success, 200);
            }
        }else{
            return response()->json($error, 500);
        }
    }

    /**
     * @param Request $request
     * @return bool|mixed
     */
    private function saveVehicleOwner(Request $request)
    {
        $vehicle_owner = new VehicleOwner();
        $vehicle_owner->name = $request->owner_name;
        $vehicle_owner->number_identification = $request->owner_number_ident;
        $vehicle_owner->id_vehicle = $request->id_vehicle;
        $vehicle_owner->save ();
        if($vehicle_owner->id_vehicle_owner){
            return $vehicle_owner->id_vehicle_owner;
        }else{
            return false;
        }
    }
    public function searchVehicleForNumberLicence()
    {
        $vehicle = Vehicle::query ()
            ->selectRaw ('count(id_vehicle) as count_vehicle,name_mark')
            ->join ('trademark','trademark.id_trademark','=','vehicle.id_trademark')
            ->groupBy (['trademark.id_trademark','name_mark'])->get();
        $vehicle_uc = $vehicle->map(function ($item) {
            $name_mark=Str::ucfirst ($item['name_mark']);
            return collect (array(
                'count_vehicle'=>$item['count_vehicle'],
                'name_mark'=>$name_mark
            ));
        });

        return response()->json($vehicle_uc, 200);
    }
}
