<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Ticket::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketRequest $request)
    {
        $createTicket = Ticket::tickets($request);
        return response()->json(['success'=>true, 'data'=>$createTicket], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showTicket = Ticket::find($id);
        $showTicket = new TicketResource ($showTicket);
        return response()->json(['success'=>true, 'data'=>$showTicket], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketRequest $request, string $id)
    {
        $updateTicker = Ticket::tickets($request, $id);
        return response()->json(['success'=>true, 'meassage'=>"Ticket is update", 'data'=>$updateTicker], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Ticket::find($id)->delete();
        return response()->json(['meassage'=>'Ticket is delete']);
    }
}
