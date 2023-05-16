<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Models\TeamEvent;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Team::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        $team = Team::teams($request);
        return response()->json(['success'=>true, 'data'=>$team]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $updateTeam = Team::find($id);
        $updateTeam = new TeamResource($updateTeam);
        return response()->json(['success'=>true,'data'=>$updateTeam], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, string $id)
    {
        $updateTeam = Team::teams($request, $id);
        return response()->json(['success'=>true, 'meassage'=>'Team is upDate', 'data'=>$updateTeam], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Team::find($id)->delete();
        return response()->json(['meassage'=>'Team is delete']);
    }
}
