<?php

namespace App\Http\Controllers;

use App\Models\Woman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class WomanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $women = woman::all();
        return view('women.index', compact('women'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('women.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validateData = $request->validate([
            'name' => 'required',
            'biography' => 'required',
            'field_of_work' => 'required',
            'cover_image' => 'required',
            'birth_date' => 'required',
        ]);

        // Create a new instance of woman model
        $woman = new woman();

        // Set the values of the woman properties from the request data
        $woman->name = $validateData['name'];
        $woman->biography = $validateData['biography'];
        $woman->field_of_work = $validateData['field_of_work'];
        $woman->cover_image = $validateData['cover_image'];
        $woman->birth_date = $validateData['birth_date'];

        // Upload and set the cover cover_image
      

        // Save the woman to the database
        $woman->save();
        Session::flash('success', 'Add New woman Successfully');
        return redirect()->route('women.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(woman $woman)
    {
        $women = woman::all();
        return view('women.show', compact('woman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(woman $woman)
    {
        $types = DB::table('women')->distinct()->get('field_of_work');
        return view ('women.edit', compact('woman', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validateData = $request->validate([
            'name' => 'required',
            'biography' => 'required',
            'field_of_work' => 'required',
            'cover_image' => 'required',
            'birth_date' => 'required',
        ]);

        // Find the woman by ID
        $woman = woman::findOrFail($id);

        // Update the woman properties from the request data
        $woman->name = $validateData['name'];
        $woman->biography = $validateData['biography'];
        $woman->field_of_work = $validateData['field_of_work'];
        $woman->cover_image = $validateData['cover_image'];
        $woman->birth_date = $validateData['birth_date'];

        // Upload and update the cover cover_cover_image if provided

        // Save the updated woman to the database
        $woman->save();
        Session::flash('success', 'woman updated successfully');
        return redirect()->route('women.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(woman $woman)
    {
        $woman->delete();
        return redirect()->route('women.index')->with('success', 'woman deleted successfully');
    }
}