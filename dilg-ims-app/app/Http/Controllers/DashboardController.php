<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\History;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Rollback to counting status quantities from Property model
        $rawStatusCounts = Property::select('status')
            ->selectRaw('COUNT(*) as count')
            ->whereIn('status', ['Issued', 'Re-Issued', 'Returned', 'Delete'])
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $statusQuantities = [
            'issued'    => $rawStatusCounts['Issued'] ?? 0,
            'reissued'  => $rawStatusCounts['Re-Issued'] ?? 0,
            'returned'  => $rawStatusCounts['Returned'] ?? 0,
            'delete'    => $rawStatusCounts['Delete'] ?? 0,
        ];

        // Sum quantity for 'Issued', 'Re-Issued', and 'Returned'
        $issuedQuantityCount = Property::where('status', 'Issued')->sum('quantity');
        $reissuedQuantityCount = Property::where('status', 'Re-Issued')->sum('quantity');
        $returnedQuantityCount = Property::where('status', 'Returned')->sum('quantity');

        // Group properties by value
        $highValueProperties = Property::where('accountable_type', 'like', 'HV')->get();
        $lowValueProperties  = Property::where('accountable_type', 'like', 'LV')->get();

        $inventorySummary = [
            'high' => $highValueProperties->groupBy('article')->map(fn($group) => $group->sum('total_cost')),
            'low'  => $lowValueProperties->groupBy('article')->map(fn($group) => $group->sum('total_cost')),
        ];

        $totalCost = [
            'high'  => $highValueProperties->sum('total_cost'),
            'low'   => $lowValueProperties->sum('total_cost'),
            'grand' => $highValueProperties->sum('total_cost') + $lowValueProperties->sum('total_cost'),
        ];

        // History stats
        $historyCount = History::count();
        $cancelledHistoryCount = History::where('reason', 'Cancelled')->count();
        $deletedPropertiesCount = History::where('reason', 'Deleted')->count();

        // Deleted quantity from current table
        $deletedQuantitySum = Property::where('status', 'Delete')->sum('quantity');

        // Group history by reason
        $historyReasonCounts = History::select('reason')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('reason')
            ->pluck('count', 'reason')
            ->toArray();

        // Add deleted properties count to cancelled history count
        $cancelledHistoryCount += $deletedPropertiesCount;

        return view('admin.admin-dashboard', compact(
            'statusQuantities',
            'issuedQuantityCount',
            'reissuedQuantityCount',
            'returnedQuantityCount',
            'inventorySummary',
            'totalCost',
            'historyCount',
            'cancelledHistoryCount',
            'deletedPropertiesCount',
            'deletedQuantitySum',
            'historyReasonCounts'
        ));
    }


    // API for dynamic status quantities
    public function statusQuantities()
    {
        $statusCounts = Property::select('status')
            ->selectRaw('COUNT(*) as count')
            ->whereIn('status', ['Issued', 'Re-Issued', 'Returned', 'Cancelled', 'Delete'])
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $quantitySums = [
            'issued_quantity' => Property::where('status', 'Issued')->sum('quantity'),
            'reissued_quantity' => Property::where('status', 'Re-Issued')->sum('quantity'),
            'returned_quantity' => Property::where('status', 'Returned')->sum('quantity'),
        ];

        $statusQuantities = array_merge($statusCounts, $quantitySums);

        $statusQuantities['history'] = History::count();

        return response()->json($statusQuantities);
    }
}
