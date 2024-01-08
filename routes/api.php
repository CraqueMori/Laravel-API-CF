<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\InvoiceController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

route::get('/users', [UserController::class, 'index']);
route::get('/users/{user}', [UserController::class, 'show']);
route::get('/invoices/', [InvoiceController::class, 'index']);
route::get('/invoices/{invoice}', [InvoiceController::class, 'show']);
route::post('/invoices', [InvoiceController::class, 'store']);
route::put('/invoices/{invoice}', [InvoiceController::class, 'update']);
route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy']);

/* Using APIResources to bind all routes

Route::apiResources('Invoices', InvoiceController::class);
*/
