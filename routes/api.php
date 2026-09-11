<?php

use App\Http\Controllers\Api\CompanyController as ApiCompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/companies/{id}', [ApiCompanyController::class, 'show'])->name('api.companies.show');