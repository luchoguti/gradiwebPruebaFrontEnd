<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get ('/searchVehicleForPlate/{number_license_plate}','VehicleController@searchVehicleForPlate');
Route::get ('/searchVehicleOwn/nameOwn/{nameOwn}','VehicleOwnerController@searchVehicleOwnName');
Route::get ('/searchVehicleOwn/numberIdentOwn/{numberIdentOwn}','VehicleOwnerController@searchVehicleOwnNumberIdent');
Route::post ('/vehicle','VehicleController@store');
Route::get ('/searchVehicleForNumberLicence','VehicleController@searchVehicleForNumberLicence');

