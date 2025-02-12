@extends('layouts.admin_layout')

@section('title', 'Registry of Semi-Expendable Property Card')

@section('contents')
<section class="section">
    <div class="card">
        <div class ="card-body"> 
            <div class="container">
                <h3 class="mb-4">Registry of Semi-Expendable Property Card</h3>
                <div class="table-responsive">
                    <table class="table table-bordered text-white" style="background-color: #002f6c;">
                        <thead>
                            <tr>
                                <th rowspan="2">Date</th>
                                <th rowspan="2">Reference</th>
                                <th colspan="3" class="text-center bg-light text-dark">Receipt</th>
                                <th rowspan="2">Item No.</th>
                                <th rowspan="2">Issue/Transfer/Disposal Qty</th>
                                <th rowspan="2">Office/Officer</th>
                                <th rowspan="2">Balance Qty</th>
                                <th rowspan="2">Amount</th>
                                <th rowspan="2">Remarks</th>
                            </tr>
                            <tr>
                                <th>Qty</th>
                                <th>Unit Cost</th>
                                <th>Total Cost</th>
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
                            </tr>        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection