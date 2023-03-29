<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employees::paginate(3);
        return view('employee.index',compact('employee'));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'FirstName' => 'required|max:255',
            'LastName' => 'required|max:255',
            'companyid' => 'required|max:255',
            'Email' => 'required|max:255',
            'phone'=> 'required|numeric',
            ]);
            $employee = Employees::create($storeData);
            return redirect('/employee')->with('completed', 'employee has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employees::findOrFail($id);
      return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'FirstName' => 'required|max:255',
            'LastName' => 'required|max:255',
            'companyid' => 'required|max:255',
            'Email' => 'required|max:255',
            'phone'=> 'required|numeric',
            ]);
            Employees::whereId($id)->update($updateData);
            return redirect('/employee')->with('completed', 'employee has been updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employees::findOrFail($id);
        $employee->delete();
        return redirect('/employee')->with('completed', 'employee has been deleted');
    }
}
