<?php

namespace Epajarito\CatalogosSat\Models;
use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
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
