<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date',
        'time',
        'description',
        'user_id',
        'address_id'

    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function address():BelongsTo{
        return $this->belongsTo(Address::class);
    }
        // many to many ================================
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_events')->withTimestamps();
    }

    public function tickets():HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public static function event($request, $id=null){
        $event = $request->only(['name','date','time','description','user_id','address_id']);
        $event = self::updateOrCreate(['id'=>$id], $event);

        $teams = request('teams');
        $event->teams()->sync($teams);

        return $event;
    }
}
