@extends('layouts.admin_layout')

@section('title', 'History')

@section('contents')
<section class="section">
    <div class="card">
        <div class ="card-body"> 
            <div class="container">
            <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                <h3 class="mb-4">History</h3>
                <div style="display: flex; align-items: center; gap: 5px;">
                    <label for="search">Search:</label>
                    <input type="text" id="search" style="width: 200px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px 10px; font-size: 14px;">
                </div>
            </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-white" style="background-color: #002C76;">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Reference</th>
                                <th>Semi-expendable Property Name</th>
                                <th>Semi-expendable Property No.</th>
                                <th>Item Description</th>
                                <th>Reason</th>
                                <th>Others</th>
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
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection