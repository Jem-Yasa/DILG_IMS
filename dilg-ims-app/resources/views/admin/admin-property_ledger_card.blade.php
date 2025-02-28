@extends('layouts.admin_layout')

@section('title', 'Semi-Expendable Property Ledger Card')

@section('contents')
<section class="section">
    <div class="card">
        <div class="card-body"> 
            <div class="container">
                <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                    <h3 class="mb-4">Semi-Expendable Property Ledger Card</h3>
                    
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <!-- Search Field -->
                        <label for="search">Search:</label>
                        <input type="text" id="search" style="width: 200px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px 10px; font-size: 14px;">

                        <!-- Filter Button -->
                        <a 
                                class="btn" 
                                style="width: 130px; height: 36px; display: flex; align-items: center; justify-content: center; 
                                    font-weight: bold; border-radius: 5px; background-color: rgb(30, 194, 38); color: white; border: none; gap: 8px; text-decoration: none;">
                                <svg width="20" height="20" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2.5a1 1 0 01-.293.707L11 12.914V17a1 1 0 01-.447.894l-2 1A1 1 0 017 18v-5.086L3.293 7.207A1 1 0 013 6.5V4z" clip-rule="evenodd"/>
                                </svg>
                                Filter
                            </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered text-white" style="background-color: #002f6c; text-align: center;">
                        <thead>
                            <tr>
                                <th rowspan="2">Date</th>
                                <th rowspan="2">Reference</th>
                                <th colspan="3" class="text-center bg-light text-dark">Receipt</th>
                                <th rowspan="2">Issued/ Transfer/ Adjustments</th>
                                <th rowspan="2">Semi-Expendable Property</th>
                                <th rowspan="2">Description</th>
                                <th rowspan="2">Semi-Expendable Property No.</th>
                                <th rowspan="2">UACS Object Code</th>
                                <th rowspan="2">Accumulated Impairment Losses</th>
                                <th rowspan="2">Adjusted Cost</th>
                                <th colspan="2" class="text-center bg-light text-dark">Repair History</th>
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