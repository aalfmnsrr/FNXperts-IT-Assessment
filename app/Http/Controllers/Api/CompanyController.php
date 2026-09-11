<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;

class CompanyController extends Controller
{
    public function show($id)
    {
        $company = Company::withCount('employees')
            ->with('employees')
            ->findOrFail($id);

        return new CompanyResource($company);
    }
}