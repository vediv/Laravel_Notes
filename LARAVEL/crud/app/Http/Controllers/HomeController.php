<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customers::all();

        return view('home')->with('data', $data);
    }

    public function save(Request $request)
    {
       
        $name = $request->input('name');
        $address = $request->input('address');

        $insert = new Customers;
        $insert->name = $name;
        $insert->address = $address;
        $insert->save();

        $id = $insert->id;

        return response()->json([
                'id' => $id,
                'name' => $name,
                'address' => $address
            ]);
    }           

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $address = $request->input('address');

        $insert = Customers::find($id);
        $insert->name = $name;
        $insert->address = $address;
        $insert->save();

        return response()->json([
                'id' => $id,
                'name' => $name,
                'address' => $address
            ]);
    }  

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $delete = Customers::find($id);
        $delete->delete();

        return response()->json([
                'id' => $id
            ]);        
    }   
}
