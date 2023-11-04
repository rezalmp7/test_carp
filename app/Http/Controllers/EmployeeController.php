<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carp;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Carp::first()->recipient->name, Carp::first()->initiator->name);
        $employee = Employee::all();
        return view('employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Employee::create([
            'name' => $request->name,
            'div' => $request->div,
            'branch' => $request->branch
        ]);

        return redirect(url('/employee'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Employee::whereId($id)->update([
            'name' => $request->name,
            'div' => $request->div,
            'branch' => $request->branch
        ]);

        return redirect(url('/employee'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::whereId($id)->delete();
        return redirect(url('/employee'));
    }
}
