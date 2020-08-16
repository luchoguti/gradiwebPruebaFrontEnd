<?php

namespace App\Http\Controllers;

use App\Models\VehicleOwner;
use Illuminate\Http\Request;

/**
 * Class VehicleOwnerController
 * @package App\Http\Controllers
 */
class VehicleOwnerController extends Controller
{
    /**
     * @param $nameOwn
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Http\JsonResponse
     */
    public function searchVehicleOwnName($nameOwn)
    {
        return $this->searchVehicleOwn ($nameOwn,0);
    }
    public function searchVehicleOwnNumberIdent($ident)
    {
        return $this->searchVehicleOwn ($ident,1);
    }
    private function searchVehicleOwn($filter,$case)
    {
        $vehicleOwnData = VehicleOwner::with ('vehicles');
        switch ($case){
            case 1:
                $vehicleOwnData->where ('number_identification','=',$filter);
            break;
            default:
                $vehicleOwnData->where ('name','=',$filter);
            break;
        }
        if($vehicleOwnData->count ()!=0){
            return $vehicleOwnData->paginate ('5');
        }else{
            return response()->json([], 201);
        }
    }
}
