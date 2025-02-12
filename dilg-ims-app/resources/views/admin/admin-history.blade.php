@extends('layouts.admin_layout')

@section('title', 'History')

@section('contents')
<section class="section">
    <div class="card">
        <div class ="card-body"> 
            <div class="container">
                <h3 class="mb-4">History</h3>
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
                                <th>Action</th>
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
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection