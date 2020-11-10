<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Packages;

class packagesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createPackage(){
        $this->withoutExceptionHandling();
        $response = $this->post('api/create-package',[
            'package_name' => 'discussion',
            'billing_id' => '',
            'created_by' => '',
            'status'     => 'active'
        ]);
        $this->assertDatabaseHas('packages',['package_name'=>'discussion']);
    }

    /** @test */
    public function editPackage(){
        $this->createPackage();
        $package = Packages::first();
        $response = $this->patch('api/edit-package/'.$package->id);
        $this->assertEquals('discussions',Packages::first()->package_name);
    }

    /** @test */
    public function assignBillToPackage(){
        $this->createPackage();
        $package = Packages::first();
        $response = $this->patch('api/attach-bill-package/'.$package->id);
        $this->assertEquals(1,Packages::first()->billing_id);
    }

    /** @test */
    public function getAllPackages(){
        $this->createPackage();
        $response = $this->get('api/get-all-packages');
        $response->assertOk();
    }

    /** @test */
    public function deletePackageTemporarily(){
        $this->createPackage();
        $package = Packages::first();
        $response = $this->patch('api/delete-package-temporarily/'.$package->id);
        $this->assertEquals('deleted',Packages::first()->status);
    }

    /** @test */
    public function deletePackageParmanetly(){
        $this->createPackage();
        $package = Packages::first();
        $response = $this->delete('api/delete-package-parmanetly/'.$package->id);
        $this->assertCount(0,Packages::all());
    }
}
