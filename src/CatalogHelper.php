<?php


namespace Epajarito\CatalogosSat;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Epajarito\CatalogosSat\Models\{
    ClaveProductoServicio,
    ClaveUnidad,
    CodigoPostal,
    FormaPago,
    Impuesto,
    MetodoPago,
    Moneda,
    Pais,
    RegimenFiscal,
    TasaOCuota,
    Comprobante,
    UsoCfdi
};

class CatalogHelper
{
    public static function CatalogoSatAduana()
    {

    }

    public static function CatalogoSatClaveProdServ()
    {
        ClaveProductoServicio::query()->forceDelete();
        $data = [];
        $filename = "catalogos_sat/c_ClaveProdServ.json";
        if(Storage::disk("public")->exists("$filename")){
            $items = json_decode(Storage::disk('public')->get($filename));
            $data = [];
            foreach ($items as $item){
                $data[] = [
                    "id"=>$item->id,
                    "descripcion"=>$item->descripcion,
                    "incluir_iva_trasladado"=>$item->incluirIVATrasladado,
                    "incluir_ieps_trasladado"=>$item->incluirIEPSTrasladado,
                    "complemento_que_debe_incluir"=>$item->complementoQueDebeIncluir,
                    "fecha_inicio_de_vigencia"=>$item->fechaInicioVigencia,
                    "fecha_fin_de_vigencia"=>$item->fechaFinVigencia,
                    "estimulo_franja_fronteriza"=>$item->estimuloFranjaFronteriza,
                    "palabras_similares"=>$item->palabrasSimilares,
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }
        return $data;
    }

    public static function CatalogoSatClaveUnidad()
    {
        ClaveUnidad::query()->forceDelete();
        $data = [];
        $filename = "catalogos_sat/c_ClaveUnidad.json";
        if(Storage::disk('public')->exists($filename)){
            $items = json_decode(Storage::disk('public')->get($filename));
            $data = [];
            foreach ($items as $item){
                $data[] = [
                    "id" => $item->id,
                    "nombre" => $item->nombre,
                    "descripcion" => $item->descripcion,
                    "nota" => $item->nota,
                    "fecha_inicio_de_vigencia" => $item->fechaDeInicioDeVigencia,
                    "fecha_fin_de_vigencia" => $item->fechaDeFinDeVigencia,
                    "simbolo" => $item->simbolo,
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }
        return $data;
    }

    public static function CatalogoSatCodigoPostal()
    {
        CodigoPostal::query()->forceDelete();
        $data = [];
        $filenames = ["catalogos_sat/c_CodigoPostal.json","catalogos_sat/c_CodigoPostal_Parte_2.json"];
        foreach ($filenames as $filename) {
            if (Storage::disk('public')->exists($filename)) {
                $items = json_decode(Storage::disk('public')->get($filename));
                $data = [];
                foreach ($items as $item) {
                    $data[] = [
                        "id" => $item->id,
                        "c_estado" => $item->c_Estado,
                        "c_municipio" => $item->c_Municipio,
                        "c_localidad" => $item->c_Localidad,
                        "estimulo_franja_fronteriza" => $item->estimuloFranjaFronteriza,
                        "fecha_inicio_de_vigencia_del_estimulo" => optional($item)->fechaInicioDeVigenciaDelEstimulo,
                        "fecha_fin_de_vigencia_del_estimulo" => optional($item)->fechaFinDeVigenciaDelEstimulo,
                        "referencias_del_huso_horario" => $item->referenciasDelHusoHorario,
                        "created_at" => now(),
                        "updated_at" => now()
                    ];
                }
            }
        }
        return $data;
    }

    public static function CatalogoSatFormaPago()
    {
        FormaPago::query()->forceDelete();
        $data = [];
        $filename = "catalogos_sat/c_FormaPago.json";
        if(Storage::disk('public')->exists($filename)){
            $items = json_decode(Storage::disk('public')->get($filename));
            $data = [];
            foreach ($items as $item){
                $data[] = [
                    "id" => $item->id,
                    "descripcion" => $item->descripcion,
                    "bancarizado" => $item->bancarizado,
                    "numero_de_operacion" => $item->numeroDeOperacion,
                    "rfc_del_emisor_de_la_cuenta_ordenante" => $item->rFCDelEmisorDeLaCuentaOrdenante,
                    "cuenta_ordenante" => $item->cuentaOrdenante,
                    "patron_para_cuenta_ordenante" => $item->patronParaCuentaOrdenante,
                    "rfc_del_emisor_cuenta_de_beneficiario" => $item->rFCDelEmisorCuentaDeBeneficiario,
                    "cuenta_de_benenficiario" => $item->cuentaDeBenenficiario,
                    "patron_para_cuenta_beneficiaria" => $item->patronParaCuentaBeneficiaria,
                    "tipo_cadena_pago" => $item->tipoCadenaPago,
                    "nombre_del_banco_emisor_de_la_caso_de_extranjero" => $item->nombreDelBancoEmisorDeLaCuentaOrdenanteEnCasoDeExtranjero,
                    "fecha_inicio_de_vigencia" => $item->fechaInicioDeVigencia,
                    "fecha_fin_de_vigencia" => $item->fechaFinDeVigencia,
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }
        return $data;
    }

    public static function CatalogoSatImpuesto()
    {
        Impuesto::query()->forceDelete();
        $data = [];
        $filename = "catalogos_sat/c_Impuesto.json";
        if(Storage::disk('public')->exists($filename)){
            $items = json_decode(Storage::disk('public')->get($filename));
            foreach ($items as $item){
                $data[] = [
                    "id" => $item->id,
                    "descripcion" => $item->descripcion,
                    "retencion" => $item->retencion,
                    "traslado" => $item->traslado,
                    "local_o_federal" => $item->localOFederal,
                    "entidad_en_la_que_aplica" => $item->entidadEnLaQueAplica,
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }
        return $data;
    }

    public static function CatalogoSatMetodoPago()
    {
        MetodoPago::query()->forceDelete();
        $data = [];
        $filename = "catalogos_sat/c_MetodoPago.json";
        if(Storage::disk('public')->exists($filename)){
            $items = json_decode(Storage::disk('public')->get($filename));
            foreach ($items as $item){
                $data[] = [
                    "id" => $item->id,
                    "descripcion" => $item->descripcion,
                    "fecha_inicio_de_vigencia" => $item->fechaInicioDeVigencia,
                    "fecha_fin_de_vigencia" => $item->fechaFinDeVigencia,
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }
        return $data;
    }

    public static function CatalogoSatMoneda()
    {
        Moneda::query()->delete();
        $data = [];
        $filename = "catalogos_sat/c_Moneda.json";
        if(Storage::disk('public')->exists($filename)){
            $items = json_decode(Storage::disk('public')->get($filename));
            foreach ($items as $item){
                $data[] = [
                    "id" => $item->id,
                    "descripcion" => $item->descripcion,
                    "decimales" => $item->decimales,
                    "porcentaje_variacion" => $item->porcentajeVariacion,
                    "fecha_inicio_de_vigencia" => $item->fechaInicioDeVigencia,
                    "fecha_fin_de_vigencia" => $item->fechaFinDeVigencia,
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }
        return $data;
    }

    public static function CatalogoSatPais()
    {
        Pais::query()->delete();
        $data = [];
        $filename = "catalogos_sat/c_Pais.json";
        if(Storage::disk('public')->exists($filename)){
            $items = json_decode(Storage::disk('public')->get($filename));
            foreach ($items as $item){
                $data[] = [
                    "id" => $item->id,
                    "descripcion" => $item->descripcion,
                    "formato_de_codigo_postal" => $item->formatoDeCodigoPostal,
                    "formato_de_registro_de_identidad_tributaria" => $item->formatoDeRegistroDeIdentidadTributaria,
                    "validacion_del_registro_de_identidad_tributaria" => $item->validacionDelRegistroDeIdentidadTributaria,
                    "agrupaciones" => $item->agrupaciones,
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }
        return $data;
    }

    public static function CatalogoSatRegimenFiscal()
    {
        RegimenFiscal::query()->delete();
        $data = [];
        $filename = "catalogos_sat/c_RegimenFiscal.json";
        if(Storage::disk('public')->exists($filename)){
            $items = json_decode(Storage::disk('public')->get($filename));
            foreach ($items as $item){
                $data[] = [
                    "id" => $item->id,
                    "descripcion" => $item->descripcion,
                    "fisica" => $item->fisica,
                    "moral" => $item->moral,
                    "fecha_inicio_de_vigencia" => $item->fechaDeInicioDeVigencia,
                    "fecha_fin_de_vigencia" => $item->fechaDeFinDeVigencia,
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }
        return $data;
    }

    public static function CatalogoSatTasaCuota()
    {
        TasaOCuota::query()->forceDelete();
        $data = [];
        $filename = "catalogos_sat/c_TasaOCuota.json";
        if(Storage::disk('public')->exists($filename)){
            $items = json_decode(Storage::disk('public')->get($filename));
            foreach ($items as $item){
                $data[] = [
                    "rango_o_fijo" => $item->rangoOFijo,
                    "minimo" => (float)$item->minimo,
                    "maximo" => (float)$item->maximo,
                    "impuesto" => $item->impuesto,
                    "factor" => $item->factor,
                    "traslado" => $item->traslado,
                    "retencion" => $item->retencion,
                    "fecha_inicio_de_vigencia" => $item->fechaInicioDeVigencia,
                    "fecha_fin_de_vigencia" => $item->fechaFinDeVigencia,
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }
        return $data;
    }

    public static function CatalogoSatTipoComprobante()
    {
        Comprobante::query()->delete();
        $data = [];
        $filename = "catalogos_sat/c_TipoDeComprobante.json";
        if(Storage::disk('public')->exists($filename)){
            $items = json_decode(Storage::disk('public')->get($filename));
            foreach ($items as $item){
                $data[] = [
                    "id" => $item->id,
                    "descripcion" => $item->descripcion,
                    "valor_maximo_ns" => $item->valorMaximoNS,
                    "valor_maximo_nds" => $item->valorMaximoNdS,
                    "fecha_inicio_de_vigencia" => $item->fechaInicioDeVigencia,
                    "fecha_fin_de_vigencia" => $item->fechaFinDeVigencia,
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }
        return $data;
    }

    public static function CatalogoSatUsoCfdi()
    {
        UsoCfdi::query()->forceDelete();
        $filename = "catalogos_sat/c_UsoCFDI.json";
        $data = [];
        if(Storage::disk('public')->exists($filename)){
            $items = json_decode(Storage::disk('public')->get($filename));
            foreach ($items as $item){
                $data[] = [
                    "id" => $item->id,
                    "descripcion" => $item->descripcion,
                    "aplica_para_tipo_persona_fisica" => $item->aplicaParaTipoPersonaFisica,
                    "aplica_para_tipo_persona_moral" => $item->aplicaParaTipoPersonaMoral,
                    "fecha_inicio_de_vigencia" => $item->fechaInicioDeVigencia,
                    "fecha_fin_de_vigencia" => $item->fechaFinDeVigencia,
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }
        return $data;
    }
}
