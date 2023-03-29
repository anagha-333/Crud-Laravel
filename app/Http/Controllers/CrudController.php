<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cruds;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Cruds::paginate(4);
return view('user.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'Name' => 'required|max:255',
            'Address' => 'required|max:255',
            'Website' => 'required|max:255',
            'Email' => 'required|max:255',
            ]);
            $company = Cruds::create($storeData);
            return redirect('/admin/company')->with('completed', 'company has been saved!');
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


      $company = Cruds::findOrFail($id);
      return view('user.edit', compact('company'));


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
            'Name' => 'required|max:255',
            'Address' => 'required|max:255',
            'Website' => 'required|max:255',
            'Email' => 'required|max:255',
            ]);
            Cruds::whereId($id)->update($updateData);
            return redirect('/admin/company')->with('completed', 'company has been updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Cruds::findOrFail($id);
        $company->delete();
        return redirect('/admin/company')->with('completed', 'company has been deleted');
    }
}
