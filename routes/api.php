<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\RMController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/generate-leads', [LeadController::class, 'generateLeads']);
Route::get('/leads-list', [LeadController::class, 'fetchLeads']);
Route::post('/generate-rm', [RMController::class, 'generateRM']);
Route::get('/fetch-rm-list', [RMController::class, 'fetchRMList']);