<?php

namespace Epajarito\CatalogosSat\Models;
use Illuminate\Database\Eloquent\Model;

class ClaveUnidad extends Model
{
    protected $table = "clave_unidades";

    public static function findOne(string $id)
    {
        return self::find($id);
    }

    public static function findByName(string $name)
    {
        return self::where('nombre', $name)->first();
    }
}
