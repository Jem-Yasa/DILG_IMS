<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\History;

class PropertyController extends Controller
{
    /**
     * Store a new property entry in the database.
     */
    public function store(Request $request)
    {
        // Remove commas from unit_value and total_cost before validation
        $request->merge([
            'unit_value' => str_replace(',', '', $request->input('unit_value')),
            'total_cost' => str_replace(',', '', $request->input('total_cost')),
        ]);

        $validatedData = $request->validate([
            'office' => 'required|string|max:255',
            'ics_rrsp_no' => 'nullable|string|max:100',
            'accountable_type' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'article' => 'required|string|max:255',
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

        Property::create($validatedData);

        return redirect()->back()->with('success', 'Property entry saved successfully!');
    }

    /**
     * Move deleted property records to history instead of deleting permanently.
     */
    public function destroy(Request $request)
    {
        $property = Property::findOrFail($request->id);

        // Move data to history table
        History::create([
            'date' => $property->date_acquired,
            'ics_rrsp_no' => $property->ics_rrsp_no,
            'accountable_type' => $property->accountable_type,
            'article' => $property->article,
            'description' => $property->description,
            'reason' => 'Deleted',
            'others' => '',
        ]);

        // Remove from the main table
        $property->delete();

        return redirect()->route('admin-history')->with('success', 'Property moved to history.');
    }

    /**
     * Display the history table.
     */
    public function history()
    {
        $histories = History::orderBy('created_at', 'desc')->get();
        return view('admin.admin-history', compact('histories'));
    }

    /**
     * Display paginated list of properties.
     */
    public function index(Request $request)
    {
        $properties = Property::latest()->paginate($request->input('per_page', 10));
        return view('admin.admin-issued_table', compact('properties'));
    }

    /**
     * Show registry table.
     */
    public function registryTable(Request $request)
    {
        $properties = Property::latest()->paginate($request->input('per_page', 10));
        return view('admin.admin-registry', compact('properties'));
    }

    /**
     * Show property acknowledgment receipt pages.
     */
    public function acknowledgmentReceipt(Request $request)
    {
        $properties = Property::latest()->paginate($request->input('per_page', 10));
        return view('admin.admin-property_acknowledgment_receipt', compact('properties'));
    }

    public function propertyAcknowledgmentReceipt(Request $request)
    {
        // $properties = Property::latest()->paginate($request->input('per_page', 10));
        $properties = Property::where('total_cost', '>=', 50000)->paginate($request->input('per_page', 10));
        return view('admin.admin-par', compact('properties'));
    }

    /**
     * Show semi-expendable property-related pages.
     */
    public function semiExpendablePropertyCardTable(Request $request)
    {
        $properties = Property::latest()->paginate($request->input('per_page', 10));
        return view('admin.admin-semi_card', compact('properties'));
    }

    public function inventoryCustodianSlip(Request $request)
    {
        // $properties = Property::latest()->paginate($request->input('per_page', 10));
        $properties = Property::where('total_cost', '<', 50000)->paginate($request->input('per_page', 10));
        return view('admin.admin-ics', compact('properties'));
    }

    public function semiExpendablePropertyLedgerCardTable(Request $request)
    {
        $properties = Property::latest()->paginate($request->input('per_page', 10));
        return view('admin.admin-property_ledger_card', compact('properties'));
    }

    //Expendable Issued
    public function semiExpendableIssued(Request $request)
    {
        $properties = Property::latest()->paginate($request->input('per_page', 10));
        return view('admin.admin-expendable_issued', compact('properties'));
    }

    /**
     * Show a specific property.
     */
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    
    public function edit($id)
    {
        $property = Property::findOrFail($id); // Find property by ID
        return view('property.edit', compact('property')); // Pass the property data to the edit view
    }
    

    /**
     * Update property entry.
     */
    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        // Remove commas from unit_value and total_cost before validation
        $request->merge([
            'unit_value' => str_replace(',', '', $request->input('unit_value')),
            'total_cost' => str_replace(',', '', $request->input('total_cost')),
        ]);

        $validatedData = $request->validate([
            'office' => 'required|string|max:255',
            'ics_rrsp_no' => 'nullable|string|max:100',
            'accountable_type' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'article' => 'required|string|max:255',
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

        $property->update($validatedData);

        return redirect()->route('properties.index')->with('success', 'Property updated successfully!');
    }

    public function storeHistory(Request $request)
    {
        $request->validate([
            'ics_rrsp_no' => 'required',
            'accountable_type' => 'required',
            'article' => 'required',
            'description' => 'required',
            'reason' => 'required', // Ensure reason is required
        ]);

        $reason = $request->reason;

        // If "Other" reason is selected, use the custom input value
        if ($request->reason === "Other") {
            $reason = $request->input('other_reason');
        }

        History::create([
            'date' => now(),
            'ics_rrsp_no' => $request->ics_rrsp_no,
            'accountable_type' => $request->accountable_type,
            'article' => $request->article,
            'description' => $request->description,
            'reason' => $reason, // Store selected/custom reason
        ]);

        return redirect()->back()->with('success', 'Record successfully moved to history!');
    }



}
