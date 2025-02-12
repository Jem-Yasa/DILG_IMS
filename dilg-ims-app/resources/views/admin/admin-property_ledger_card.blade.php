@extends('layouts.admin_layout')

@section('title', 'Semi-Expendable Property Card')

@section('contents')
<section class="section">
    <div class="card">
        <div class ="card-body"> 
            <div class="container">
                <h3 class="mb-4">Semi-Expendable Property Card</h3>
                <div class="table-responsive">
                <table class="table table-bordered text-white" style="background-color: #002f6c;">
    <thead>
        <tr>
            <th rowspan="2">Date</th>
            <th rowspan="2">Reference</th>
            <th rowspan="2">Semi-expandable Property No.</th>
            <th rowspan="2">Semi-expandable Property</th>
            <th colspan="3" class="text-center bg-light text-dark">Receipt</th>
            <th rowspan="2">Issued/Transfers/Adjustments</th>
            <th rowspan="2">Accumulated Impairment Losses</th>
            <th rowspan="2">Adjusted Cost</th>
            <th colspan="2" class="text-center bg-light text-dark">Repair History</th>
            <th rowspan="2">UACS Object Code</th>
            <th rowspan="2">Action</th>
        </tr>
        <tr>
            <th>Qty</th>
            <th>Unit Cost</th>
            <th>Total Cost</th>
            <th>Nature of Repair</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

    </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection