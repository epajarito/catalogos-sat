<?php

namespace Epajarito\CatalogosSat\Models;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    public static function findOne(string $id)
    {
        return self::find($id);
    }

    public static function findByDescription(string $description)
    {
        return self::where('descripcion', $description)->first();
    }
}
