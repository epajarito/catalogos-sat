<?php

namespace Epajarito\CatalogosSat\Models;
use Illuminate\Database\Eloquent\Model;

class TasaOCuota extends Model
{
    protected $table = 'tasa_o_cuota';

    public static function findOne(int $id)
    {
        return self::find($id);
    }

    public static function findByTax(string $tax)
    {
        return self::where('impuesto', $tax)->first();
    }
}
