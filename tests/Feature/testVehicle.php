<?php

namespace Tests\Feature;

use App\Models\Trademark;
use App\Models\TypeVehicle;
use App\Models\Vehicle;
use App\Models\VehicleOwner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class testVehicle extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test search.
     *
     * @return void
     */
    public function testSearchVehicleForPlate()
    {
        $this->withoutExceptionHandling ();
        $this->testCreateVehicleAndOwn ();
        $value = "HYU-890";
        $response = $this->get("/api/searchVehicleForPlate/$value");
        $response->assertOk ();
    }
    /**
     * A basic feature test create.
     *
     * @return void
     */
    public function testCreateVehicleAndOwn (){
        $this->withoutExceptionHandling ();
        $number_ident = '5678919';
        $number_plate = 'HYU-890';
        $name = 'Luis Al.';

        factory (Trademark::class,10)->create ();
        factory (TypeVehicle::class,10)->create ();

        $response = $this->post ("/api/vehicle",[
            'number_license_plate'=>$number_plate,
            'trademark'=>6,
            'type'=>4,
            'owner_name'=>$name,
            'owner_number_ident'=> $number_ident
        ]);
        $response->assertOk ();
        $this->assertCount (1,Vehicle::all ());
        $this->assertCount (1,VehicleOwner::all ());

        $post_one = Vehicle::first();
        $this->assertEquals ($post_one->number_license_plate,$number_plate);

        $post_two = VehicleOwner::first();
        $this->assertEquals ($post_two->number_identification,$number_ident);
        $this->assertEquals ($post_two->name,$name);
    }
    /**
     * A basic feature test search vehicle for number licence.
     *
     * @return void
     */
    public function testSearchVehicleForNumberLicence()
    {
        $this->withoutExceptionHandling ();
        factory (Trademark::class,10)->create ();
        factory (TypeVehicle::class,10)->create ();
        factory (Vehicle::class,10)->create ();

        $response = $this->get("/api/searchVehicleForNumberLicence");
        $response->assertOk ();
        $data_response = json_decode ($response->getContent (),true);
        $this->assertArrayHasKey ('count_vehicle',$data_response[0]);
        $this->assertArrayHasKey ('name_mark',$data_response[0]);
        $response->getCallback ();
    }
}
