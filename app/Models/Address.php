<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'zone',

    ];
    public static function address($request, $id=null){
        $address = $request->only(['address', 'zone']);
        $address = self::updateOrCreate(['id'=>$id],$address);
        return $address;
    }
}
