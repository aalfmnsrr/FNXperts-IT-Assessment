<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display index page with a list of companies.
     */
    public function index()
    {
        $companies = Company::latest()->paginate(10);

        return view('companies.index', compact('companies'));
    }

    /**
     * Display the form for creating a new company.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store newly created company in the database.
     */
    public function store(StoreCompanyRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Company::create($data);

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified company along with its employees.
     */
    public function show(Company $company)
    {
        $employees = $company->employees()->paginate(10);

        return view('companies.show', compact('company', 'employees'));
    }

    /**
     * Display form for editing the specified company.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified company in the database.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company->update($data);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Delete the specified company and its employees from the database.
     */
    public function destroy(Company $company)
    {
        // Delete the company's logo if it exists
        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }

        // Delete the company and its employees
        $company->employees()->delete();
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company and its employees deleted successfully.');
    }
}
