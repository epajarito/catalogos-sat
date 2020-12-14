<?php

namespace Epajarito\CatalogosSat\Models;
use Illuminate\Database\Eloquent\Model;

class ClaveProductoServicio extends Model
{

    public static function findOne(int $id)
    {
        return self::find($id);
    }

    public static function findByDescription(string $description)
    {
        return self::where('descripcion', $description)->first();
    }
}
