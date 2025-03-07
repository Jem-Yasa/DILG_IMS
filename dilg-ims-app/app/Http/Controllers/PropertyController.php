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
            'office' => 'required|string|max:255',
            'ics_rrsp_no' => 'nullable|string|max:100',
            'accountable_type' => 'required|string|max:255',
            'article' => 'required|string|max:255', // Updated field name
            'description' => 'required|string',
            'unit_measure' => 'required|string|max:100',
            'unit_value' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'total_cost' => 'nullable|numeric|min:0',
            'inventory_item_no' => 'nullable|string|max:100',
            'date_acquired' => 'required|date',
            'estimated_useful_life' => 'nullable|string|max:100',
            'accountable_officer' => 'required|string|max:255',
            'status' => 'nullable|string|in:Issued,Returned,Re-Issued,Canceled',
            'remarks' => 'nullable|string',
        ]);

        // Create a new Property record
        Property::create($request->all());

        return redirect()->back()->with('success', 'Property entry saved successfully!');
    }

    /**
     * Show a list of all property entries.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 records per page
        $properties = Property::orderBy('created_at', 'desc')->paginate($perPage);

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
            'office' => 'required|string|max:255',
            'ics_rrsp_no' => 'nullable|string|max:100',
            'accountable_type' => 'required|string|max:255',
            'article' => 'required|string|max:255', // Updated field name
            'description' => 'required|string',
            'unit_measure' => 'required|string|max:100',
            'unit_value' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'total_cost' => 'nullable|numeric|min:0',
            'inventory_item_no' => 'nullable|string|max:100',
            'date_acquired' => 'required|date',
            'estimated_useful_life' => 'nullable|string|max:100',
            'accountable_officer' => 'required|string|max:255',
            'status' => 'nullable|string|in:Issued,Returned,Re-Issued,Canceled',
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
