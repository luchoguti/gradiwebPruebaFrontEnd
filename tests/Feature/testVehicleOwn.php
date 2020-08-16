<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class testVehicleOwn extends TestCase
{
  use RefreshDatabase;
  /**
   * @test
   */
  public function search_vehicle_own_name()
  {
    $this->withoutExceptionHandling ();
    $nameOwn = "Ardith";
    $response = $this->get("/api/searchVehicleOwn/nameOwn/$nameOwn");
    $response->assertOk ();
  }

    /**
     * @test
     */
  public function search_vehicle_own_numberIdent()
  {
      $this->withoutExceptionHandling ();
      $numberIdentOwn = "399023164";
      $response = $this->get("/api/searchVehicleOwn/numberIdentOwn/$numberIdentOwn");
      $response->assertOk ();
  }
}
