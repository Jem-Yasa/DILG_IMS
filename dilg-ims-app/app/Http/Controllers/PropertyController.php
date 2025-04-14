<?php  

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\IssuedProperty;
use App\Models\PropertyHistory;

class PropertyController extends Controller
{
    /**
     * Store a new property entry in the database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'office' => 'required|string|max:255',
            'ics_rrsp_no' => 'nullable|string|max:100',
            'accountable_type' => 'required|string|max:255',
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
     * Show various admin property pages.
     */
    public function acknowledgmentReceipt(Request $request)
    {
        $properties = Property::latest()->paginate($request->input('per_page', 10));
        return view('admin.admin-property_acknowledgment_receipt', compact('properties'));
    }

    public function propertyAcknowledgmentReceipt(Request $request)
    {
        $properties = Property::latest()->paginate($request->input('per_page', 10));
        return view('admin.admin-par', compact('properties'));
    }

    public function semiExpendablePropertyCardTable(Request $request)
    {
        $properties = Property::latest()->paginate($request->input('per_page', 10));
        return view('admin.admin-semi_card', compact('properties'));
    }

    public function inventoryCustodianSlip(Request $request)
    {
        $properties = Property::latest()->paginate($request->input('per_page', 10));
        return view('admin.admin-ics', compact('properties'));
    }
    
    
        public function semiExpendablePropertyLedgerCardTable(Request $request)
    {
        // Fetch properties from database (filtered for 'Semi-Expendable')
        $properties = Property::where('type', 'Semi-Expendable')->latest()->paginate(10);

        // Pass the data to the view
        return view('admin.admin-property_ledger_card', compact('properties'));
    }

   

    /**
     * Show a specific property.
     */
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    /**
     * Edit property entry.
     */
    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('property.edit', compact('property'));
    }

    /**
     * Update property entry.
     */
    public function update(Request $request, Property $property)
    {
        $validatedData = $request->validate([
            'office' => 'required|string|max:255',
            'ics_rrsp_no' => 'nullable|string|max:100',
            'accountable_type' => 'required|string|max:255',
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

        return redirect()->route('properties.index')->with('success', 'Property entry updated successfully!');
    }

    /**
     * Fetch semi-expendable issued items.
     */
    public function semiExpendableIssued(Request $request)
    {
        $properties = Property::where('type', 'Semi-Expendable')->where('status', 'Issued')->latest()->paginate($request->input('per_page', 10));
        return view('admin.admin-expendable_issued', compact('properties'));
    }
}
