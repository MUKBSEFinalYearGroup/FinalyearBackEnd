<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packages;
use App\Http\Resources\PackagesResource;

class PackagesController extends Controller
{
    protected function createPackage(Packages $package){
        return $package->create($this->validatePackage());
    }

    protected function editPackage($id){
        Packages::find($id)->update(array('package_name'=>'discussions'));
    }

    protected function attachBill($id){
        Packages::find($id)->update(array('billing_id'=>1));
    }

    protected function getAllPackages(){
        return PackagesResource::collection(Packages::join('users','users.id','packages.created_by')->get());
    }

    protected function deletePackageTemporarily($id){
        Packages::find($id)->update(array('status'=>'deleted'));
    }

    protected function deletePackageParmanetly($id){
        Packages::find($id)->delete();
    }

    protected function validatePackage(){
        return request()->validate([
            'package_name' => 'required',
            'billing_id'   => '',
            'created_by'   => '',
            'status'       => 'required'
        ]);
    }
}
