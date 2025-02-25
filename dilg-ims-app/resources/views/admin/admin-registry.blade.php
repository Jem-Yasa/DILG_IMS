@extends('layouts.admin_layout')

@section('title', 'Registry of Semi-Expendable Property Issued')

@section('contents')
    <section class="section">
        <div class="card">
            <div class ="card-body"> 
                <div class="container">
                <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                        <h3 class="mb-4">Registry of Semi-Expendable Property Issued</h3>
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
                                <th rowspan="2">ICS/PAR RRSP No.</th>
                                <th rowspan="2">Semi-expendable Property No.</th>
                                <th rowspan="2">Item Description</th>
                                <th rowspan="2">Estimated Useful Life</th>
                                <th colspan="2" class="text-center bg-light text-dark">Issued</th>
                                <th colspan="2" class="text-center bg-light text-dark">Returned</th>
                                <th colspan="2" class="text-center bg-light text-dark">Re-Issued</th>
                                <th rowspan="2">Disposal Qty</th>
                                <th rowspan="2">Balance Qty</th>
                                <th rowspan="2">Amount</th>
                                <th rowspan="2">Remarks</th>
                            </tr>
                            <tr>
                                <th>Qty</th>
                                <th>Office/Officer</th>
                                <th>Qty</th>
                                <th>Office/Officers</th>
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