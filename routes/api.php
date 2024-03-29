<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamEventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// user ===============================================================
Route::get('/getAllUser',           [UserController::class, 'index']);
Route::post('/storeUser',           [UserController::class, 'store']);
Route::get('/getDetail/{id}' ,      [UserController::class, 'show']);
Route::put('/updateUser/{id}' ,     [UserController::class, 'update']);
Route::delete('/deleteUser/{id}',   [UserController::class, 'destroy']);

// Addreess ============================================================
Route::get('/getAllAddress',        [AddressController::class, 'index']);
Route::post('/postAddress',         [AddressController::class, 'store']);
Route::get('/showAddress/{id}',     [AddressController::class, 'show']);
Route::put('/updateAddress/{id}',   [AddressController::class, 'update']);
Route::delete('/deleteAddress/{id}',[AddressController::class, 'destroy']);

// Event =================================================================
Route::get('/getAllEvent',          [EventController::class,'index']);
Route::post('/postEvent',           [EventController::class,'store']);
Route::get('/showEvent/{id}',       [EventController::class,'show']);
Route::put('/updateEvent/{id}',     [EventController::class,'update']);
Route::delete('/deleteEvent/{id}',  [EventController::class,'destroy']);

// Team ==================================================================
Route::get('/getAllTeam',           [TeamController::class,'index']);
Route::post('/postTeam',            [TeamController::class,'store']);
Route::get('/showTeam/{id}',        [TeamController::class,'show']);
Route::put('/updateTeam/{id}',      [TeamController::class,'update']);
Route::delete('/deleteTeam/{id}',   [TeamController::class,'destroy']);

// Ticket ================================================================
Route::get('/getAllTicket',         [TicketController::class,'index']);
Route::post('/postTicket',          [TicketController::class,'store']);
Route::get('/showTicket/{id}',      [TicketController::class,'show']);
Route::put('/updateTicket/{id}',    [TicketController::class,'update']);
Route::delete('/deleteTicket/{id}', [TicketController::class,'destroy']);

