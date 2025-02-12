@extends('layouts.admin_layout')

@section('title', 'Property Issued Table')

@section('contents')
<section class="section">
    <div class="card">
        <div class ="card-body"> 
            <div class="container">
                <h3 class="mb-4">Property Issued Table</h3>
                <div class="table-responsive">
                    <table class="table table-bordered text-white">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th rowspan="2">Date</th>
                                <th rowspan="2">ICS/RRSP No.</th>
                                <th rowspan="2">Semi-expandable Property No.</th>
                                <th rowspan="2">Semi-expandable Property</th>
                                <th rowspan="2">Reference</th>
                                <th rowspan="2">Item Description</th>
                                <th rowspan="2">Estimated Useful Life</th>
                                <th colspan="2" class="text-center">Issued</th>
                                <th colspan="2" class="text-center">Returned</th>
                                <th colspan="2" class="text-center">Re-Issued</th>
                                <th rowspan="2">Disposal Qty</th>
                                <th rowspan="2">Balance Qty</th>
                                <th rowspan="2">Amount</th>
                                <th rowspan="2">Remarks</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Qty</th>
                                <th>Office/Officers</th>
                                <th>Qty</th>
                                <th>Office/Officers</th>
                                <th>Re-Issued Qty</th>
                                <th>Re-Issued Office/Officer</th>
                            </tr>
                        </thead>
                        <tbody class="bg-dark text-white">
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