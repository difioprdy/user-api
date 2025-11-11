<?php

use App\Http\Controllers\Api\UserController;

//API endpoint: GET /api/users
Route::get('/users', [UserController::class, 'index']);
