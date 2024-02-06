<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    private static $unit;

    public static function newUnit($request)
    {
        self::saveInfo(new Unit(), $request);
    }
    public static function updateUnit($request, $id)
    {
        self::$unit = Unit::find($id);
        self::saveInfo(self::$unit, $request, );
    }

    public static function deleteUnit($request)
    {
        self::$unit = Unit::find($request->id);

        self::$unit->delete();
    }
    private static function saveInfo($unit, $request)
    {
        $unit->name         = $request->name;
        $unit->Code         = $request->code;
        $unit->description  = $request->description;
        $unit->status       = $request->status;
        $unit->save();
    }
}
