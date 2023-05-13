<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Address::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request)
    {
        $address = Address::address($request);
        return response()->json(['success'=>true,'data'=>$address]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $address = Address::find($id);
        $address = new AddressResource($address);
        return response()->json(['data'=>$address],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, string $id)
    {
        $updateAddress = Address::address($request,$id);
        return response()->json(['success'=>true, 'meassage'=>'address is upDate', 'data'=>$updateAddress]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Address::find($id)->delete();
        return response()->json(['meassage'=>'address is delete'],200);
    }
}
