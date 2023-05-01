<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::resource('admin', AdminController::class);
