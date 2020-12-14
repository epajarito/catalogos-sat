<?php


namespace Epajarito\CatalogosSat\Models;


use Illuminate\Database\Eloquent\Model;

class CodigoPostal extends Model
{
    protected $table = 'codigo_postales';

    public static function findOne(int $id)
    {
        return self::find($id);
    }
}
