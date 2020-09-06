<?php

namespace Tests\Feature;

use App\Models\Trademark;
use App\Models\TypeVehicle;
use App\Models\Vehicle;
use App\Models\VehicleOwner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class testVehicleOwn extends TestCase
{
  use RefreshDatabase;
    /**
     * A basic feature test search vehicle for own name.
     *
     * @return void
     */
  public function testSearchVehicleOwnName()
  {
    $this->withoutExceptionHandling ();
    factory (Trademark::class,10)->create ();
    factory (TypeVehicle::class,10)->create ();
    factory (Vehicle::class,10)->create ();
    factory (VehicleOwner::class,1)->create ();

    $nameOwn = "Ardith";
    $response = $this->get("/api/searchVehicleOwn/nameOwn/$nameOwn");
    $response->assertOk ();
  }

    /**
     * A basic feature test search vehicle own number identification.
     *
     * @return void
     */
  public function testSearchVehicleOwnNumberIdent()
  {
      $this->withoutExceptionHandling ();
      factory (Trademark::class,10)->create ();
      factory (TypeVehicle::class,10)->create ();
      factory (Vehicle::class,10)->create ();
      factory (VehicleOwner::class,1)->create ();

      $numberIdentOwn = "89898293";
      $response = $this->get("/api/searchVehicleOwn/numberIdentOwn/$numberIdentOwn");
      $response->assertOk ();
  }
}
