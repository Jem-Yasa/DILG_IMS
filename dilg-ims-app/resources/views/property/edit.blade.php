@extends('layouts.admin_layout')
@section('title', 'Property Edit')

@section('contents')
<section class="section">
    <div class="card">
        <div class="card-header" style="background-color: #002f6c; color: white; font-weight: bold;">
            Edit Property Entry
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

            <form action="{{ route('property.update', $property->id) }}" method="POST">
                @csrf
                @method('PUT')

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
                            <select id="office" name="office" class="form-control">
                                <option value="" disabled>Select Office</option>
                                @php
                                    $offices = ['FAD', 'FAD - Accounting', 'FAD - Budget', 'FAD - Cash', 'FAD - GSU', 'FAD - Personnel', 'FAD - Records', 'FAD - Supply', 'LGCDD', 'LGMED', 'LGRRC', 'OARD', 'ORD', 'ORD - Legal', 'ORD - RICTU', 'ORD - SRMU', 'COA', 'PDMU', 'OPCEN', 'AKLAN', 'ANTIQUE', 'CAPIZ', 'GUIMARAS', 'ILOILO PROVINCE', 'ILOILO CITY'];
                                @endphp
                                @foreach($offices as $office)
                                    <option value="{{ $office }}" {{ old('office', $property->office) == $office ? 'selected' : '' }}>{{ $office }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="ics_rrsp_no">ICS/RRSP No.</label>
                            <input type="text" id="ics_rrsp_no" name="ics_rrsp_no" class="form-control" value="{{ old('ics_rrsp_no', $property->ics_rrsp_no) }}">
                        </div>
                        <div class="col-md-3">
                            <label for="accountable_type">Accountable Type</label>
                            <select id="accountable_type" name="accountable_type" class="form-control">
                                <option value="" disabled selected>Accountable Type</option>
                                @foreach(['ICT Equipment', 'Office Equipment', 'Furniture & Fixture', 'Communication', 'Books'] as $type)
                                    <option value="{{ $type }}" {{ old('accountable_type', $property->accountable_type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="value">Value</label>
                            <select id="value" name="value" class="form-control">
                                <option value="" disabled selected>Value</option>
                                <option value="High" {{ old('value', $property->value) == 'High' ? 'selected' : '' }}>High</option>
                                <option value="Low" {{ old('value', $property->value) == 'Low' ? 'selected' : '' }}>Low</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="article">Article</label>
                            <input type="text" id="article" name="article" class="form-control" value="{{ old('article', $property->article) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description" class="form-control" value="{{ old('description', $property->description) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="unit_measure">Unit of Measure</label>
                            <input type="text" id="unit_measure" name="unit_measure" class="form-control" value="{{ old('unit_measure', $property->unit_measure) }}">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="unit_value">Unit Value</label>
                            <input type="text" name="unit_value" id="unit_value" class="form-control" value="{{ old('unit_value', number_format($property->unit_value, 2)) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $property->quantity) }}" min="1">
                        </div>
                        <div class="col-md-4">
                            <label for="total_cost">Total Cost</label>
                            <input type="text" name="total_cost" id="total_cost" class="form-control" value="{{ old('total_cost', number_format($property->total_cost, 2)) }}" readonly>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inventory_item_no">Inventory Item No.</label>
                            <input type="text" id="inventory_item_no" name="inventory_item_no" class="form-control" value="{{ old('inventory_item_no', $property->inventory_item_no) }}">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="date_acquired">Date Acquired</label>
                            <input type="date" id="date_acquired" name="date_acquired" class="form-control" value="{{ old('date_acquired', $property->date_acquired) }}">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="estimated_useful_life">Estimated Useful Life</label>
                            <input type="text" id="estimated_useful_life" name="estimated_useful_life" class="form-control" value="{{ old('estimated_useful_life', $property->estimated_useful_life) }}">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="accountable_officer">Accountable Officer</label>
                            <input type="text" id="accountable_officer" name="accountable_officer" class="form-control" value="{{ old('accountable_officer', $property->accountable_officer) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="" disabled>Select Status</option>
                                <option value="Issued" {{ old('status', $property->status) == 'Issued' ? 'selected' : '' }}>Issued</option>
                                <option value="Returned" {{ old('status', $property->status) == 'Returned' ? 'selected' : '' }}>Returned</option>
                                <option value="Re-Issued" {{ old('status', $property->status) == 'Re-Issued' ? 'selected' : '' }}>Re-Issued</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="remarks">Remarks</label>
                            <input type="text" id="remarks" name="remarks" class="form-control" value="{{ old('remarks', $property->remarks) }}">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn" style="background-color: #008000; color: white; border: none;">
                                <i class="fa fa-save"></i> Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

{{-- Auto-calculate total cost --}}
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

    document.getElementById("quantity").addEventListener("input", function () {
        calculateTotalCost();
    });

    document.querySelector("form").addEventListener("submit", function () {
        document.getElementById("unit_value").value = removeCommas(document.getElementById("unit_value").value);
        document.getElementById("total_cost").value = removeCommas(document.getElementById("total_cost").value);
    });
</script>

{{-- Format Estimated Useful Life --}}
<script>
    document.getElementById('estimated_useful_life').addEventListener('input', function () {
        let value = this.value.replace(/\D/g, '');
        if (value) {
            this.value = value + " years";
        } else {
            this.value = "";
        }
    });
</script>
@endsection