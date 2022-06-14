<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SettingsController;

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

Route::post("/login", [AuthController::class, "login"]);
Route::post("/messages", [MessagesController::class, "store"]);
Route::get("/projects/featured", [ProjectsController::class, "featured"]);
Route::get("/settings", [SettingsController::class, "index"]);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('messages', MessagesController::class)->only(['index', 'destroy']);
    Route::post('delete-messages', [MessagesController::class, "deleteMessages"]);
    Route::resource('projects', ProjectsController::class)->except(['create', 'edit']);
    Route::post("/projects/reorder", [ProjectsController::class, "updateOrder"]);
    Route::post("/settings", [SettingsController::class, "update"]);
});