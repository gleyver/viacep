<?php

use App\Http\Controllers\Api\V1\CepController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/cep/{cep}', [CepController::class, 'show']);
});
