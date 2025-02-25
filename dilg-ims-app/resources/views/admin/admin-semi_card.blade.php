@extends('layouts.admin_layout')

@section('title', 'Semi-Expandable Property Card')

@section('contents')
    <section class="section">
        <div class="card">
            <div class ="card-body"> 
                <div class="container">
                <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                <h3 class="mb-4">Semi-Expandable Property Card</h3>
                <div style="display: flex; align-items: center; gap: 5px;">
                    <label for="search">Search:</label>
                    <input type="text" id="search" style="width: 200px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px 10px; font-size: 14px;">
                </div>
                </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-white" style="background-color: #002C76; text-align: center;">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Date</th>
                                        <th rowspan="2">Reference</th>
                                        <th colspan="3" class="text-center bg-light text-dark">Receipt</th>
                                        <th rowspan="2">Semi-Expendable Property</th>
                                        <th rowspan="2">Semi-Expendable Property No.</th>
                                        <th colspan="3" class="text-center bg-light text-dark">Issue/Transfer/Disposal</th>
                                        <th rowspan="2">Description</th>
                                        <th rowspan="2">Balance Qty</th>
                                        <th rowspan="2">Amount</th>
                                        <th rowspan="2">Remarks</th>
                                    </tr>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Unit Cost</th>
                                        <th>Total Cost</th>
                                        <th>Item No.</th>
                                        <th>Qty</th>
                                        <th>Office/Officer</th>
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