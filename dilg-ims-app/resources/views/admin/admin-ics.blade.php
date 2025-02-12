@extends('layouts.admin_layout')

@section('title', 'Inventory Custodian Report')

@section('contents')
<section class="section">
    <div class="card">
        <div class ="card-body"> 
            <div class="container">
                <h3 class="mb-4">Inventory Custodian Report</h3>
                <div class="table-responsive">
                <table class="table table-bordered text-white" style="background-color: #002f6c;">
    <thead>
    <table class="table table-bordered text-white" style="background-color: #002f6c;">
    <thead>
            <tr>
                <th rowspan="2">Quality</th>
                <th rowspan="2">Unit</th>
                <th colspan="2" class="text-center bg-light text-dark">Amount</th>
                <th rowspan="2">Description</th>
                <th rowspan="2">Item No.</th>
                <th rowspan="2">Estimated Useful Life</th>
            </tr>
        <tr>
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
            </tr>
    </tbody>
</table>


    </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection