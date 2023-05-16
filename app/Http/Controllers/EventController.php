<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allEvents = Event::all();
        $eventName = request('name');
        $allEvents = Event::where('name', 'like', '%'.$eventName. '%')->get();
        $allEvents =  EventResource::collection($allEvents);
        return $allEvents;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $events = Event::event($request);
        return response()->json(['success'=>true, 'data'=>$events],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showEvent = Event::find($id);
        $showEvent = new EventResource($showEvent);
        return response()->json(['success'=> true, 'date'=>$showEvent], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $id)
    {

        $updateevent = Event::event($request, $id);
        return response()->json(['success'=>true, 'meassage'=>'events is upDate', 'data'=>$updateevent]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::find($id)->delete();
        return response()->json(['meassage'=>'event is delete']);
    }
}
