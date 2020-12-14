# Catálogos del SAT para CFDI 3.3 para proyectos hechos en Laravel

Catálogos SAT es una proyecto que te proporciona los catálogos del sat para generación de CFDI 3.3 específicamente para proyectos hechos en Laravel.

## Instalación

Usar composer para instalar el paquete.

```bash
composer require epajarito/catalogos-sat
```

## Es necesario ejecutar
```bash
php artisan vendor:publish
```
y seleccionar la opción
```bash
catalogos-sat-dir
```
eso hará que se agreguen los archivos necesarios para la importación.

## Ejecutar migraciones

```bash
php artisan migrate
```
y finalmente ejecutar
```bash
php artisan catalogos-sat:insert-all-catalog-sat
```
## Donaciones
Si este proyecto te ayuda a reducir el tiempo de desarrollo, puedes comprarme una caguama 🍺

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.me/epajarito)

## Fuente archivos json
[https://github.com/bambucode/catalogos_sat_JSON](https://github.com/angelsantosa/inegi-lista-estados)

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](./LICENSE.md)
