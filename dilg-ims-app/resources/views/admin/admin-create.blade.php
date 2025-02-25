@extends('layouts.admin_layout')

@section('title', 'Property Entry')

@section('contents')
    <section class="section">
        <div class="card">
            <!-- Header Section -->
            <div class="card-header" style="background-color: #002f6c; color: white; font-weight: bold;">
                Property Entry
            </div>

            <div class="card-body">
                <form action="{{ route('property.store') }}" method="POST">
                    @csrf
                    <div class="container">
                        <div class="row">

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                            <!-- Property Type -->
                            <div class="col-md-6 mb-3">
                                <label for="property_type">Property Type</label>
                                <select id="property_type" name="property_type" class="form-control">
                                    <option value="" disabled selected>Select Property Type</option>
                                    <option value="ICT Equipment">ICT Equipment</option>
                                    <option value="Office Equipment">Office Equipment</option>
                                    <option value="Furniture & Fixture">Furniture & Fixture</option>
                                    <option value="Communication">Communication</option>
                                    <option value="Books">Books</option>
                                    <option value="Other Machinery & Equipment">Other Machinery & Equipment</option>
                                    <option value="Disaster Response & Rescue">Disaster Response & Rescue</option>
                                    <option value="Building">Building</option>
                                    <option value="Motor Vehicle">Motor Vehicle</option>
                                    <option value="Computer Software">Computer Software</option>
                                </select>
                            </div>

                            <!-- Entry Name -->
                            <div class="col-md-6 mb-3">
                                <label for="entry_name">Entry Name</label>
                                <input type="text" id="entry_name" name="entry_name" class="form-control">
                            </div>

                            <!-- Date Acquired -->
                            <div class="col-md-4 mb-3">
                                <label for="date_acquired">Date Acquired</label>
                                <input type="date" id="date_acquired" name="date_acquired" class="form-control">
                            </div>

                            <!-- ICS/RRSP No. -->
                            <div class="col-md-4 mb-3">
                                <label for="ics_rrsp_no">ICS/RRSP No.</label>
                                <input type="text" id="ics_rrsp_no" name="ics_rrsp_no" class="form-control">
                            </div>

                            <!-- Reference -->
                            <div class="col-md-4 mb-3">
                                <label for="reference">Reference</label>
                                <input type="text" id="reference" name="reference" class="form-control">
                            </div>

                            <!-- Semi-expendable Property Name -->
                            <div class="col-md-6 mb-3">
                                <label for="semi_expendable_name">Semi-expandable Property Name</label>
                                <input type="text" id="semi_expendable_name" name="semi_expendable_name" class="form-control">
                            </div>
                            
                            <!-- Semi-expendable Property No. -->
                            <div class="col-md-6 mb-3">
                                <label for="semi_expendable_no">Semi-expandable Property No.</label>
                                <input type="text" id="semi_expendable_no" name="semi_expendable_no" class="form-control">
                            </div>

                            <!-- Item Description, Estimated Useful Life, and Status in a Single Row -->
                            <div class="col-md-12 mb-3">
                                <div class="row">
                                    <!-- Item Description -->
                                    <div class="col-md-4">
                                        <label for="item_description">Item Description</label>
                                        <input type="text" id="item_description" name="item_description" class="form-control">
                                    </div>

                                    <!-- Estimated Useful Life -->
                                    <div class="col-md-4">
                                        <label for="estimated_useful_life">Estimated Useful Life</label>
                                        <input type="text" id="estimated_useful_life" name="estimated_useful_life" class="form-control">
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-4">
                                        <label for="status">Status</label>
                                        <select id="status" name="status" class="form-control">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="Issued">Issued</option>
                                            <option value="Returned">Returned</option>
                                            <option value="Re-Issued">Re-Issued</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Amount, Quantity, and Office/Officer in a Single Row -->
                            <div class="col-md-12 mb-3">
                                <div class="row">
                                    <!-- Amount with Currency Label -->
                                    <div class="col-md-4">
                                        <label for="amount">Amount</label>
                                        <div class="input-group">
                                            <input type="text" id="amount" name="amount" class="form-control">
                                            <span class="input-group-text" style="background-color: #ccc; color: black;">PHP</span>
                                        </div>
                                    </div>

                                    <!-- Quantity -->
                                    <div class="col-md-4">
                                        <label for="quantity">Quantity</label>
                                        <input type="text" id="quantity" name="quantity" class="form-control">
                                    </div>

                                    <!-- Office/Officer -->
                                    <div class="col-md-4">
                                        <label for="office_officer">Office/Officer</label>
                                        <input type="text" id="office_officer" name="office_officer" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <!-- Remarks -->
                            <div class="col-md-12 mb-3">
                                <label for="remarks">Remarks</label>
                                <input type="text" id="remarks" name="remarks" class="form-control">
                            </div>

                            <!-- Save Button -->
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn" style="background-color: #008000; color: white; border: none;">
                                    <i class="fa fa-save"></i> Save
                                </button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection