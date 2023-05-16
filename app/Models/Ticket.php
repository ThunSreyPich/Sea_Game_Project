<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'event_id'
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function event():BelongsTo{
        return $this->belongsTo(Event::class);
    }

    public static function tickets($request, $id=null){
        $ticket = $request->only(['user_id', 'event_id']);
        $ticket = self::updateOrCreate(['id'=>$id],$ticket);
        return $ticket;
    }

}
