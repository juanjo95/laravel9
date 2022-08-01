<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/**
 * Route::get    Consultar
 * Route::post   Guardar
 * Route::put    Actualizar
 * Route::delete Eliminar
 */

Route::get('/', function () {
    return 'Ruta home';
});
Route::get('blog', function () {
    return 'Listado de publicaciones';
});
Route::get('blog/{slug}', function ($slug) {
    //Consulta a base de datos
    return $slug;
});
Route::get('buscar', function (Request $request) {
    return $request->all();
});
