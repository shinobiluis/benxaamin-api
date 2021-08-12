<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Importamos el controllador de empleado
use App\Http\Controllers\EmployeeController;
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


// Rutas para api de empleado
Route::post('insert/employee', [ EmployeeController::class, 'insert' ]);
Route::get('consult/employees', [ EmployeeController::class, 'consultEmployees']);
Route::get('consult/employee/{employee_id}', [ EmployeeController::class, 'consultEmployee'] );
