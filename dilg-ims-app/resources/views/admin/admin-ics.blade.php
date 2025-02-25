@extends('layouts.admin_layout')

@section('title', 'Inventory Custodian Slip')

@section('contents')
    <section class="section">
        <div class="card">
            <div class="card-body"> 
                <div class="container">
                    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                        <h3 class="mb-4">Inventory Custodian Slip</h3>
                        <div style="display: flex; align-items: center; gap: 5px;">
                            <label for="search">Search:</label>
                            <input type="text" id="search" 
                                style="width: 200px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px 10px; font-size: 14px;">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-white" style="background-color: #002f6c; text-align: center;">
                            <thead>
                                <tr>
                                    <th rowspan="2">Entity Name</th>
                                    <th rowspan="2">ICS No</th>
                                    <th rowspan="2">Quantity</th>
                                    <th rowspan="2">Unit</th>
                                    <th colspan="2" class="text-center" style="background-color: #ffffff; color: #002f6c;">Amount</th>
                                    <th rowspan="2">Description</th>
                                    <th rowspan="2">Item No.</th>
                                    <th rowspan="2">Estimated Useful Life</th>
                                </tr>
                                <tr>
                                    <th style="background-color: #002f6c;">Unit Cost</th>
                                    <th style="background-color: #002f6c;">Total Cost</th>
                                </tr>
                            </thead>
                            <tbody style="color: black; background-color:rgb(196, 196, 196);">
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection