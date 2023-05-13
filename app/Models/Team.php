<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'teamName',
        'user_id',
    ];

    public function team():BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public static function teams($request, $id=null){
        $team = $request->only(['teamName','user_id']);
        $team = self::updateOrCreate(['id'=>$id],$team);
        return $team;
    }
}
