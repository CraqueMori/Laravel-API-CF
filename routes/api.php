<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\InvoiceController;
use \App\Http\Controllers\AuthController;
use App\Http\Controllers\TesteController;
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

//Route Example:
//''route::**http-protocol**("/urlto", [**classinstance::class**, "class method"])
route::get('/users', [UserController::class, 'index']);
route::get('/users/{user}', [UserController::class, 'show']);
route::get('/invoices/', [InvoiceController::class, 'index']);
route::get('/invoices/{invoice}', [InvoiceController::class, 'show']);
route::post('/invoices', [InvoiceController::class, 'store']);
route::put('/invoices/{invoice}', [InvoiceController::class, 'update']);


//The constructor of Invoice Controller is a use case of how to protect routes
route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy']);
route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function (){
    route::post('/logout', [AuthController::class, 'logout']);
    route::get('/teste', [TesteController::class, 'index']);
});


//You can use Token and Permission Abilities has a Middleware
/*
  if you want to do access only if have ALL the array abilities
  Route::get('/test', function() {})->middleware(['auth:sanctum', "abilities: check-payments, invoice-creator'])
  if you want to do access to ONE of the array abilities
  Route::get('/test', function() {})->middleware(['auth:sanctum', "ability:check-status"])
*/


/* Using APIResources to bind all routes
Route::apiResources('Invoices', InvoiceController::class);
*/

/* Using Group to protect routes
    Route::middleware("auth:sanctum")->group(function(){
        route::get('/invoices/', [InvoiceController::class, 'index']);
        route::get('/invoices/{invoice}', [InvoiceController::class, 'show']);
        route::post('/invoices', [InvoiceController::class, 'store']);
        route::put('/invoices/{invoice}', [InvoiceController::class, 'update']);
        route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy']);
};)
*/

//To change a token time expiration, change in sanctum.php
//You have to change the timezone.
//you can create a Schedule to remove your expired tokens
