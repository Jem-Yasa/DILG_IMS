@extends('layouts.admin_layout')

@section('title', 'Semi-Expendable Property Ledger Card')

@section('contents')
<section class="section">
    <div class="card">
        <div class ="card-body"> 
            <div class="container">
                 <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                    <h3 class="mb-4">Semi-Expendable Property Ledger Card</h3>
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <label for="search">Search:</label>
                        <input type="text" id="search" style="width: 200px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px 10px; font-size: 14px;">
                </div>
            </div>
                 <div class="table-responsive">
                    <table class="table table-bordered text-white" style="background-color: #002f6c; text-align: center;">
                            <thead>
                                <tr>
                                    <th rowspan="2">Date</th>
                                    <th rowspan="2">Reference</th>
                                    <th rowspan="2">Semi-expendable Property</th>
                                    <th colspan="3" class="text-center bg-light text-dark">Receipt</th>
                                    <th rowspan="2">Issued/ Transfer/ Adjustments</th>
                                    <th rowspan="2">Semi-expendable Property No.</th>
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
                            <tbody style="color: black; background-color: rgb(196, 196, 196);">
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