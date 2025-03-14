@extends('layouts.admin_layout')

@section('title', 'Property Entry')

@section('contents')
    <section class="section">
        <div class="card">
            <div class="card-header" style="background-color: #002f6c; color: white; font-weight: bold;">
                Property Entry
            </div>
            <div class="card-body">
                <form action="{{ route('property.store') }}" method="POST">
                    @csrf
                    <div class="container">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <label for="office">Office</label>
                                <select id="office" name="office" class="form-control">
                                <option value="" disabled selected>Select Office</option>
                                <option value="FAD">FAD</option>
                                <option value="FAD - Accounting">FAD - Accounting</option>
                                <option value="FAD - Budget">FAD - Budget</option>
                                <option value="FAD - Cash">FAD - Cash</option>
                                <option value="FAD - GSU">FAD - GSU</option>
                                <option value="FAD - Personnel">FAD - Personnel</option>
                                <option value="FAD - Records">FAD - Records</option>
                                <option value="FAD - Supply">FAD - Supply</option>
                                <option value="LGCDD">LGCDD</option>
                                <option value="LGMED">LGMED</option>
                                <option value="LGRRC">LGRRC</option>
                                <option value="OARD">OARD</option>
                                <option value="ORD">ORD</option>
                                <option value="ORD - Legal">ORD - Legal</option>
                                <option value="ORD - RICTU">ORD - RICTU</option>
                                <option value="ORD - SRMU">ORD - SRMU</option>
                                <option value="PDMU">PDMU</option>
                                <option value="PDMU">OPCEN</option>
                                <option value="AKLAN">AKLAN</option>
                                <option value="ANTIQUE">ANTIQUE</option>
                                <option value="CAPIZ">CAPIZ</option>
                                <option value="GUIMARAS">GUIMARAS</option>
                                <option value="ILOILO PROVINCE">ILOILO PROVINCE</option>
                                <option value="ILOILO CITY">ILOILO CITY</option>
                            </select>
                            </div>
                            <div class="col-md-4">
                                <label for="ics_rrsp_no">ICS/RRSP No.</label>
                                <input type="text" id="ics_rrsp_no" name="ics_rrsp_no" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="accountable_type">Accountable Type</label>
                                <select id="accountable_type" name="accountable_type" class="form-control">
                                <option value="" disabled selected>Accountable Type</option>
                                <option value="" disabled>── SEMI-EXPENDABLE PROPERTIES HIGH VALUE ──</option>
                                <option value="ICT Equipment HV">ICT Equipment</option>
                                <option value="Office Equipment HV">Office Equipment</option>
                                <option value="Furniture & Fixture HV">Furniture & Fixture</option>
                                <option value="Communication HV">Communication</option>
                                <option value="Books LV">Books</option>
                                <option value="" disabled>── SEMI-EXPENDABLE PROPERTIES LOW VALUE ──</option>
                                <option value="ICT Equipment LV">ICT Equipment</option>
                                <option value="Office Equipment LV">Office Equipment</option>
                                <option value="Furniture & Fixture LV">Furniture & Fixture</option>
                                <option value="Communication LV">Communication</option>
                                <option value="Books LV">Books</option>
                            </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="article">Article</label>
                                <input type="text" id="article" name="article" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="description">Description</label>
                                <input type="text" id="description" name="description" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="unit_measure">Unit of Measure</label>
                                <input type="text" id="unit_measure" name="unit_measure" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="unit_value">Unit Value</label>
                                <input type="text" id="unit_value" name="unit_value" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="quantity">Quantity</label>
                                <input type="text" id="quantity" name="quantity" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="total_cost">Total Cost</label>
                                <input type="text" id="total_cost" name="total_cost" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="inventory_item_no">Inventory Item No.</label>
                                <input type="text" id="inventory_item_no" name="inventory_item_no" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="date_acquired">Date Acquired</label>
                                <input type="date" id="date_acquired" name="date_acquired" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="estimated_useful_life">Estimated Useful Life</label>
                                <input type="text" id="estimated_useful_life" name="estimated_useful_life" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="accountable_officer">Accountable Officer</label>
                                <input type="text" id="accountable_officer" name="accountable_officer" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="Issued">Issued</option>
                                    <option value="Returned">Returned</option>
                                    <option value="Re-Issued">Re-Issued</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="remarks">Remarks</label>
                                <input type="text" id="remarks" name="remarks" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
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

    <!-- Total Cost -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Select input fields
            const unitValueInput = document.getElementById("unit_value");
            const quantityInput = document.getElementById("quantity");
            const totalCostInput = document.getElementById("total_cost");

            // Function to calculate total cost
            function calculateTotalCost() {
                let unitValue = parseFloat(unitValueInput.value) || 0;
                let quantity = parseInt(quantityInput.value) || 0;
                let totalCost = unitValue * quantity;

                totalCostInput.value = totalCost.toFixed(2); // Display as a decimal (e.g., 100.00)
            }

            // Attach event listeners to update total cost dynamically
            unitValueInput.addEventListener("input", calculateTotalCost);
            quantityInput.addEventListener("input", calculateTotalCost);
        });
    </script>

    <!-- useful life -->
    <script>
        document.getElementById('estimated_useful_life').addEventListener('input', function () {
            let value = this.value.replace(/\D/g, ''); // Remove non-numeric characters
            if (value) {
                this.value = value + " years";
            } else {
                this.value = ""; // Keep empty if no valid number
            }
        });
    </script>

@endsection
