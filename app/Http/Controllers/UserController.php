<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserResquest;
use App\Http\Resources\ShowUserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserResquest $request)
    {
        $userStore = User::storeUser($request);
        return response()->json(['success'=>true, 'data'=>$userStore],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $getDetail = User::find($id);
        $getDetail = new ShowUserResource($getDetail);
        return response()->json(['success'=>true, 'data'=>$getDetail], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserResquest $request, string $id)
    {
        $updateUser = User::storeUser($request,$id);
        return response()->json(['success'=>true, 'meassage'=>'user is upDate', 'data'=>$updateUser]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return response()->json(['meassage'=> 'user is delete'],200);
    }
}
