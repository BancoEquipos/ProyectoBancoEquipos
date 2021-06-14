<?php

use App\Http\Controllers\API\MotivoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PrestamoController;
use App\Http\Controllers\API\TipocomponenteController;
use App\Http\Controllers\API\ComponenteController;
use App\Http\Controllers\API\AlumnoController;
use App\Http\Controllers\API\CicloformativoController;
use App\Http\Controllers\API\DomicilioController;
use App\Http\Controllers\API\IncidenciaController;
use App\Http\Controllers\API\PrestamosComponenteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('prestamos', PrestamoController::class);
Route::apiResource('tipocomponentes', TipocomponenteController::class);
Route::apiResource('motivos', MotivoController::class);
Route::apiResource('componentes', ComponenteController::class);
Route::apiResource('alumnos', AlumnoController::class);
Route::apiResource('incidencias', IncidenciaController::class);
Route::apiResource('cicloformativos', CicloformativoController::class);
Route::apiResource('domicilios', DomicilioController::class);
Route::apiResource('prestamoscomponente', PrestamosComponenteController::class);
