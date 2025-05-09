<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('properties.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
       
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',  //  validation for location
            'caretaker_id' => 'nullable|exists:users,id', //  validation for caretaker_id
            'manager_id' => 'nullable|exists:users,id',  //  validation for manager_id
        ]);

        // 2. Get the currently logged-in user
        $user = auth()->user();

        // 3. Create a new Property instance and associate it with the user
        $property = new Property();
        $property->name = $validatedData['name'];
        $property->location = $validatedData['location'];
        $property->caretaker_id = $validatedData['caretaker_id'];
        $property->manager_id = $validatedData['manager_id'];

        $property->save();

        // 4. Redirect to a success page
        return redirect()->route('properties.index')->with('success', 'Property added successfully!');
   
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, Property $property)
    {
        if (Gate::denies('update', $property)) {
            abort(403, 'Unauthorized.'); 
        }

         
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            
        ]);

        // 2. Update the Model
        $property->update($validatedData);

        // 3. Redirect
        return redirect()->route('properties.show', $property->id)->with('success', 'Property updated successfully!');
   
    }

   
    public function destroy(Request $request, Property $property)
    {
        if (Gate::denies('delete', $property)) {
            abort(403, 'Unauthorized.'); 
        }

        $property->delete();

        
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully!');
   
    }
}
