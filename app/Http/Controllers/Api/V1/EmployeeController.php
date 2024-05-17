<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;


class EmployeeController extends Controller
{
    
    public function index()
    {
        $employee = Employee::all();
        return EmployeeResource::collection($employee);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'nullable|string|max:255',  // Endret til nullable for å tillate tomme verdier
            'email' => 'nullable|string|email|max:255|unique:customers,Email',
            'password' => 'nullable|string|min:8',
            'phone' => 'nullable|string',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);

            $employee = Employee::create($validated);

            return EmployeeResource::make($employee);
        }
    }

    public function show(Employee $employee)
    {
        return EmployeeResource::make($employee);
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'nullable|string|max:255',  // Endret til nullable for å tillate tomme verdier
            'email' => 'nullable|string|email|max:255|unique:customers,Email',
            'password' => 'nullable|string|min:8',
            'phone' => 'nullable|string',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);

            $employee->update($validated);

            return EmployeeResource::make($employee);
    }    
}    


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['message' => 'employee deleted successfully']);
    
    }
}
