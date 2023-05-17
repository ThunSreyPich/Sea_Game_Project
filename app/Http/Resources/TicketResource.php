<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'created_by'=>$this->user->name ?? null,
            'events'=>$this->event->address,
            'teams'=>TeamResource::collection($this->event->teams),
            'events'=>$this->event,
            
        ];
    }
}

