<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;


class EmployeeController extends Controller
{
    /**
     * Display employee index page with a list of employees.
     */
    public function index()
    {
        $employees = Employee::with('company')->latest()->paginate(10);

        return view('employees.index', compact('employees'));
    }

    /**
     * Display the form for creating a new employee.
     */
    public function create()
    {
        $companies = Company::orderBy('name')->get(); // get all companies to populate the dropdown

        return view('employees.create', compact('companies'));
    }

    /**
     * Store newly created employee in the database.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();

        Employee::create($data);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Show the specified employee along with their company.
     */
    public function show(Employee $employee)
    {
        $employee->load('company'); // find the employee and their company

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified employee.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::orderBy('name')->get(); // get all companies to populate the dropdown

        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified employee in the database.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();

        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Delete the specified employee from the database.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
