<?php


namespace Epajarito\CatalogosSat\Console\Commands;
use Epajarito\CatalogosSat\CatalogHelper;

use Epajarito\CatalogosSat\Models\ClaveProductoServicio;
use Epajarito\CatalogosSat\Models\ClaveUnidad;
use Epajarito\CatalogosSat\Models\CodigoPostal;
use Epajarito\CatalogosSat\Models\Comprobante;
use Epajarito\CatalogosSat\Models\FormaPago;
use Epajarito\CatalogosSat\Models\Impuesto;
use Epajarito\CatalogosSat\Models\MetodoPago;
use Epajarito\CatalogosSat\Models\Moneda;
use Epajarito\CatalogosSat\Models\Pais;
use Epajarito\CatalogosSat\Models\RegimenFiscal;
use Epajarito\CatalogosSat\Models\TasaOCuota;
use Epajarito\CatalogosSat\Models\UsoCfdi;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;

class InsertCatalogsSat extends Command
{

    protected $signature = "catalogos-sat:insert-all-catalog-sat";
    protected $description = "Script para insertar catálogos del sat";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        //catalogo sat aduana
        //$items = CatalogHelper::CatalogoSatAduana();

        //start insert catálogo producto servicio
        $this->insertModels(
            ClaveProductoServicio::class,
            CatalogHelper::CatalogoSatClaveProdServ(),
            "insertando clave producto servicio...",
            "clave producto servicio insertados...",
            5000
        );
        //end insert catálogo producto servicio


        //start insert catálogo producto servicio
        $this->insertModels(
            ClaveUnidad::class,
            CatalogHelper::CatalogoSatClaveUnidad(),
            "insertando clave unidad...",
            "clave unidad insertados...",
            5000
        );
        //end insert catálogo producto servicio


        //start insert catálogo código postales
        $this->insertModels(
            CodigoPostal::class,
            CatalogHelper::CatalogoSatCodigoPostal(),
            "insertando código postales...",
            "código postales insertados...",
            5000
        );
        //end insert catálogo código postales

        //start insert catálogo forma de pago
        $this->insertModels(
            FormaPago::class,
            CatalogHelper::CatalogoSatFormaPago(),
            "insertando forma de pago...",
            "forma de pago insertados...",
            5000
        );
        //end insert catálogo forma de pago

        //start insert catálogo impuestos
        $this->insertModels(
            Impuesto::class,
            CatalogHelper::CatalogoSatImpuesto(),
            "insertando impuestos...",
            "impuestos insertados...",
            5000
        );
        //end insert catálogo impuestos

        //start insert metódo de pago
        $this->insertModels(
            MetodoPago::class,
            CatalogHelper::CatalogoSatMetodoPago(),
            "insertando metódo de pagos...",
            "metódo de pagos insertados...",
            5000
        );
        //end insert metódo de pago

        //start insert monedas
        $this->insertModels(
            Moneda::class,
            CatalogHelper::CatalogoSatMoneda(),
            "insertando monedas...",
            "monedas insertados...",
            5000
        );
        //end insert monedas

        //start insert paises
        $this->insertModels(
            Pais::class,
            CatalogHelper::CatalogoSatPais(),
            "insertando paises...",
            "paises insertados...",
            5000
        );
        //end insert paises

        //start insert regimen fiscales
        $this->insertModels(
            RegimenFiscal::class,
            CatalogHelper::CatalogoSatRegimenFiscal(),
            "insertando paises...",
            "paises insertados...",
            5000
        );
        //end insert regimen fiscales

        //start insert tasa o cuota
        $this->insertModels(
            TasaOCuota::class,
            CatalogHelper::CatalogoSatTasaCuota(),
            "insertando tasa o cuota...",
            "tasa o cuota insertados...",
            5000
        );
        //end insert tasa o cuota

        //start insert tipo comprobantes
        $this->insertModels(
            Comprobante::class,
            CatalogHelper::CatalogoSatTipoComprobante(),
            "insertando tipo comprobantes...",
            "tipo comprobantes insertados...",
            5000
        );
        //end insert tipo comprobantes

        //start insert uso cfdi
        $this->insertModels(
            UsoCfdi::class,
            CatalogHelper::CatalogoSatUsoCfdi(),
            "insertando uso cfdi...",
            "uso cfdi insertados...",
            5000
        );
        //end insert uso cfdi

    }

    private function starProgressBar(array $items, string $message)
    {
        $bar = $this->output->createProgressBar(count($items));
        $this->info("$message");
        $bar->start();
        return $bar;
    }

    private function endProgressBar($bar,string $message)
    {
        $bar->finish();
        $this->newLine();
        $this->info("$message");
        $this->newLine(3);
    }

    private function insertModels($model, array $items,string $start_message,string $end_message, int $no_chunks)
    {
        $bar = $this->starProgressBar($items,"$start_message");
        collect($items)->chunk($no_chunks)->each(
            function ($chunk) use ($bar,$model){
                $model::query()->insert($chunk->toArray());
                $bar->advance();
            }
        );
        $this->endProgressBar($bar,"$end_message");
    }
}
