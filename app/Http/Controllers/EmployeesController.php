<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Employees::paginate(10);
        return view('employees.index', ['employees' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'first_name' => "required | max:255",
                'last_name' => "required | max:255",
                'title' => "required | max:100"
            ]
        );
        Employees::create($data);
        session()->flash('success', 'Created Successfully');
        return redirect()->route('employees.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employees $employee)
    {
        return view('employees.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employees $employee)
    {
        $data = $request->validate(
            [
                'first_name' => "required | max:255",
                'last_name' => "required | max:255",
                'title' => "required | max:100"
            ]
        );
        $employee->update($data);
        session()->flash('success', 'Updated Successfully');
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employees $employee)
    {
        $employee->delete();
        session()->flash('success', 'Deleted Successfully');
        return redirect()->route('employees.index');
    }
}
