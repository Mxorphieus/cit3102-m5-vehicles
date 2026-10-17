<?php

use App\Http\Controllers\VehicleController;
use App\Http\Controllers\AuthController;

app('router')->post('/register', [AuthController::class, 'register']);
app('router')->post('/login', [AuthController::class, 'login']);

app('router')->middleware('auth:sanctum')->group(function () {
    app('router')->post('/logout', [AuthController::class, 'logout']);
    app('router')->get('/me', [AuthController::class, 'me']);

    app('router')->get('/vehicles', [VehicleController::class, 'index']);
    app('router')->post('/vehicles', [VehicleController::class, 'store']);
    app('router')->get('/vehicles/{vehicle}', [VehicleController::class, 'show']);
    app('router')->put('/vehicles/{vehicle}', [VehicleController::class, 'update']);
    app('router')->delete('/vehicles/{vehicle}', [VehicleController::class, 'destroy']);
});