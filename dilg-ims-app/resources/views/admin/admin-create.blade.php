@extends('layouts.admin_layout')

@section('title', 'Property Entry')

@section('contents')
<section class="section">
    <div class="card">
        <div class="card-header" style="background-color: #002f6c; color: white; font-weight: bold;">
            Property Entry
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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
                        <div class="col-md-3">
                            <label for="office">Office</label>
                            <select id="office" name="office" class="form-control" required>
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
                                <option value="COA">COA</option>
                                <option value="PDMU">PDMU</option>
                                <option value="OPCEN">OPCEN</option>
                                <option value="AKLAN">AKLAN</option>
                                <option value="ANTIQUE">ANTIQUE</option>
                                <option value="CAPIZ">CAPIZ</option>
                                <option value="GUIMARAS">GUIMARAS</option>
                                <option value="ILOILO PROVINCE">ILOILO PROVINCE</option>
                                <option value="ILOILO CITY">ILOILO CITY</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="ics_rrsp_no">ICS/RRSP No.</label>
                            <input type="text" id="ics_rrsp_no" name="ics_rrsp_no" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="accountable_type">Accountable Type</label>
                            <select id="accountable_type" name="accountable_type" class="form-control" required>
                                <option value="" disabled selected>Accountable Type</option>
                                <option value="ICT Equipment">ICT Equipment</option>
                                <option value="Office Equipment">Office Equipment</option>
                                <option value="Furniture & Fixture">Furniture & Fixture</option>
                                <option value="Communication">Communication</option>
                                <option value="Books">Books</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="value">Value</label>
                            <select id="value" name="value" class="form-control" required>
                                <option value="" disabled selected>Value</option>
                                <option value="High">High</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="article">Article</label>
                            <input type="text" id="article" name="article" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="unit_measure">Unit of Measure</label>
                            <input type="text" id="unit_measure" name="unit_measure" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="unit_value">Unit Value</label>
                            <input type="text" name="unit_value" id="unit_value" class="form-control" value="0.00" required>
                        </div>
                        <div class="col-md-4">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required>
                        </div>
                        <div class="col-md-4">
                            <label for="total_cost">Total Cost</label>
                            <input type="text" name="total_cost" id="total_cost" class="form-control" value="0.00" readonly>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inventory_item_no">Inventory Item No.</label>
                            <input type="text" id="inventory_item_no" name="inventory_item_no" class="form-control">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="date_acquired">Date Acquired</label>
                            <input type="date" id="date_acquired" name="date_acquired" class="form-control" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="estimated_useful_life">Estimated Useful Life</label>
                            <input type="text" id="estimated_useful_life" name="estimated_useful_life" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="accountable_officer">Accountable Officer</label>
                            <input type="text" id="accountable_officer" name="accountable_officer" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control" required>
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

{{-- Scripts --}}
<script>
    function formatNumberWithCommas(x) {
        const parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }

    function removeCommas(value) {
        return value.replace(/,/g, "");
    }

    function calculateTotalCost() {
        const unitRaw = removeCommas(document.getElementById("unit_value").value);
        const quantity = parseFloat(document.getElementById("quantity").value);

        if (!isNaN(unitRaw) && !isNaN(quantity)) {
            const total = parseFloat(unitRaw) * quantity;
            document.getElementById("total_cost").value = formatNumberWithCommas(total.toFixed(2));
        } else {
            document.getElementById("total_cost").value = '';
        }
    }

    document.getElementById("unit_value").addEventListener("input", function (e) {
        const raw = removeCommas(e.target.value);
        if (!isNaN(raw)) {
            e.target.value = formatNumberWithCommas(raw);
        }
        calculateTotalCost();
    });

    document.getElementById("quantity").addEventListener("input", calculateTotalCost);

    document.querySelector("form").addEventListener("submit", function () {
        document.getElementById("unit_value").value = removeCommas(document.getElementById("unit_value").value);
        document.getElementById("total_cost").value = removeCommas(document.getElementById("total_cost").value);
    });

    // Useful life script
    document.getElementById('estimated_useful_life').addEventListener('input', function () {
        let value = this.value.replace(/\D/g, '');
        this.value = value ? value + " years" : '';
    });

    // Initialize total cost on page load
    window.addEventListener("load", calculateTotalCost);
</script>
@endsection
