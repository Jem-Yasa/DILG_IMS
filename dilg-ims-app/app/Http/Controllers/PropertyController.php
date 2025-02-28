<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Store a new property entry in the database.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'property_type' => 'required|string',
            'entry_name' => 'required|string|max:255',
            'date_acquired' => 'required|date',
            'ics_rrsp_no' => 'nullable|string|max:100',
            'reference' => 'nullable|string|max:255',
            'semi_expendable_name' => 'nullable|string|max:255',
            'semi_expendable_no' => 'nullable|string|max:100',
            'item_description' => 'nullable|string',
            'estimated_useful_life' => 'nullable|string|max:100',
            'status' => 'nullable|string|in:Issued,Returned,Re-Issued',
            'quantity' => 'nullable|integer|min:0',
            'office/officer' => 'nullable|string|max:100',
            'amount' => 'required|numeric|min:0',
            'remarks' => 'nullable|string',
        ]);

        // Create a new Property record
        Property::create($request->all());

        return redirect()->back()->with('success', 'Property entry saved successfully!');
    }

    /**
     * Show a list of all property entries.
     */
    // public function index()
    // {
    //     $properties = Property::latest()->paginate(5); // Fetch all properties
    //     return view('admin.admin-issued_table', compact('properties'));
    // }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 records per page
        $properties = Property::paginate($perPage);
        return view('admin.admin-issued_table', compact('properties'));
    }

    /**
     * Show a specific property entry.
     */
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    /**
     * Show the form for editing a property entry.
     */
    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('property.edit', compact('property'));
    }

    /**
     * Update a specific property entry.
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'property_type' => 'required|string',
            'entry_name' => 'required|string|max:255',
            'date_acquired' => 'required|date',
            'ics_rrsp_no' => 'nullable|string|max:100',
            'reference' => 'nullable|string|max:255',
            'semi_expendable_name' => 'nullable|string|max:255',
            'semi_expendable_no' => 'nullable|string|max:100',
            'item_description' => 'nullable|string',
            'estimated_useful_life' => 'nullable|string|max:100',
            'status' => 'nullable|string|in:Issued,Returned,Re-Issued',
            'amount' => 'required|numeric|min:0',
            'remarks' => 'nullable|string',
        ]);

        $property->update($request->all());

        return redirect()->route('properties.index')->with('success', 'Property entry updated successfully!');
    }

    /**
     * Delete a specific property entry.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property entry deleted successfully!');
    }
}
