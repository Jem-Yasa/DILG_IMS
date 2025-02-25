@extends('layouts.admin_layout')

@section('title', 'Reports of Semi-Expendable Issued')

@section('contents')
    <section class="section">
        <div class="card">
            <div class ="card-body"> 
                <div class="container">
                <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                <h3 class="mb-4">Reports of Semi-Expendable Issued</h3>
                <div style="display: flex; align-items: center; gap: 5px;">
                    <label for="search">Search:</label>
                    <input type="text" id="search" style="width: 200px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px 10px; font-size: 14px;">
                </div>
            </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-white" style="background-color: #002C76;">
                            <thead>
                                <tr>
                                    <th>ICS No.</th>
                                    <th>Responsibility Center Code</th>
                                    <th>Semi-expendable Property No.</th>
                                    <th>Item Description</th>
                                    <th>Unit</th>
                                    <th>Quantity Issued</th>
                                    <th>Unit Cost</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody  style="color: black; background-color:rgb(196, 196, 196);">
                                <tr>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection