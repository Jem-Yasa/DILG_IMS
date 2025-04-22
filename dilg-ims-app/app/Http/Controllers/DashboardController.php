<?php 
use App\Models\Property;

public function index()
{
    $statuses = ['issued', 'returned', 'reissued', 'cancelled'];

    $statusQuantities = [];

    foreach ($statuses as $status) {
        $statusQuantities[$status] = Property::whereRaw('LOWER(status) = ?', [$status])->sum('quantity');
    }   

    // Semi-Expandable Cost Summary (HIGH/LOW VALUE)
    $highValueProperties = Property::where('accountable_type', 'like', '%HV')->get();
    $lowValueProperties  = Property::where('accountable_type', 'like', '%LV')->get();

    $inventorySummary = [
        'high' => $highValueProperties->groupBy('article')->map(fn($group) => $group->sum('total_cost')),
        'low'  => $lowValueProperties->groupBy('article')->map(fn($group) => $group->sum('total_cost')),
    ];

    $totalCost = [
        'high'  => $highValueProperties->sum('total_cost'),
        'low'   => $lowValueProperties->sum('total_cost'),
        'grand' => $highValueProperties->sum('total_cost') + $lowValueProperties->sum('total_cost'),
    ];

    // For debugging: Log the array to check
    \Log::debug($statusQuantities);

    // Return the view with the correct compact variables
    return view('admin.dashboard', compact('statusQuantities', 'inventorySummary', 'totalCost'));
}
