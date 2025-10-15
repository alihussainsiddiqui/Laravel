<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Route::get("/create", [CustomerController::class, "CreateView"])->name("ShowCreate");
Route::post("/submit", [CustomerController::class, "AddCustomer"])->name("submitCustomer");
Route::get("/list", [CustomerController::class, "ShowData"])->name("ListView");
Route::delete("/delete/{id}", [CustomerController::class, "DeleteData"])->name("del");
Route::get("/edit/{id}", [CustomerController::class, "edit"])->name("editData");
Route::put("/update/{id}", [CustomerController::class, "update"])->name("updateData");
Route::get("/trash", [CustomerController::class, "Trashed"])->name("trashedContent");
Route::delete("/pdelete/{id}", [CustomerController::class, "ForceDelete"])->name("pdelete");
Route::get("/restore/{id}", [CustomerController::class, "RestoreData"])->name("restore");

// Route::get("/hello", [DataController::class, "show"]);
// Route::get("/show",[UserController::class, "ShowData"])->name("ShowUser");
// Route::get("/user/{name}/{id}", [UserController::class, "UserData"]);
