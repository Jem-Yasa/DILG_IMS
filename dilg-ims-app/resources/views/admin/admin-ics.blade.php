@extends('layouts.admin_layout')

@section('title', 'Inventory Custodian Slip')

@section('contents')
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h3 class="mb-4">Inventory Custodian Slip</h3>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    <!-- Records Dropdown -->
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <label for="recordsPerPage" class="me-2">Show</label>
                        <select name="per_page" id="recordsPerPage" class="form-select form-select-sm me-2" style="width: 70px;" onchange="submitFilterForm()">
                            <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        </select>
                        <span>records</span>
                    </div>

                    <!-- Search & Filter -->
                    <div style="display: flex; align-items: center; gap: 10px; position: relative;">
                        <div style="display: flex; align-items: center; gap: 5px;">
                            <label for="search">Search:</label>
                            <input type="text" id="search" onkeyup="filterTable()" 
                                style="width: 200px; height: 30px; border: 1px solid #ccc; 
                                        border-radius: 5px; padding: 5px 10px; font-size: 14px;">
                        </div>

                        <!-- Filter Button -->
                        <button id="filterButton" class="btn d-flex align-items-center" 
                                style="width: 130px; height: 40px; font-weight: bold; border-radius: 5px; background-color: rgb(30, 194, 38); color: white; border: none;" 
                                onclick="toggleFilterDropdown()">
                            <svg width="20" height="20" fill="white" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2.5a1 1 0 01-.293.707L11 12.914V17a1 1 0 01-.447.894l-2 1A1 1 0 017 18v-5.086L3.293 7.207A1 1 0 013 6.5V4z" clip-rule="evenodd"/>
                            </svg>
                            Filter
                        </button>

                        <!-- Inventory Type Filter -->
                        <div id="filterDropdown" style="display: none; position: absolute; background: white; padding: 10px; border-radius: 5px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1); width: 250px;">
                                            <select id="inventoryTypeDropdown" class="form-select" style="width: 100%; padding: 5px;">
                                            <<option value="" disabled selected>Inventory Type</option>
                                                <option value="ICT Equipment">ICT Equipment</option>
                                                <option value="Office Equipment">Office Equipment</option>
                                                <option value="Furniture & Fixture">Furniture & Fixture</option>
                                                <option value="Communication">Communication</option>
                                                <option value="Books">Books</option>
                                            </select>
                                            <button onclick="cancelFilter()" style="background-color: #ff3b3b; color: white; border: none; padding: 10px; font-size: 16px; font-weight: bold; border-radius: 8px; cursor: pointer; width: 100%; height: 40px; text-align: center; margin-top: 3px;">
                                                Cancel Filter
                                            </button>
                                        </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered text-white" style="background-color: #002f6c; text-align: center;">
                        <thead>
                            <tr>
                                <th rowspan="2">Quantity</th>
                                <th rowspan="2">Unit</th>
                                <th colspan="2" style="background-color: #D3D3D3; color: black;">Amount</th> 
                                <th rowspan="2">Description</th>
                                <th rowspan="2">Item No.</th>
                                <th rowspan="2">Estimated Useful Life</th>
                                <th rowspan="2">Inventory Type</th>
                            </tr>
                            <tr>
                                <th>Unit Cost</th>
                                <th>Total Cost</th>
                            </tr>
                        </thead>
                        <tbody id="table-body" style="color: black; background-color: rgb(196, 196, 196);">
                            @if(count($properties) > 0)
                                @foreach ($properties as $property)
                                    <tr data-type="{{ $property->accountable_type }}">
                                        <td>{{ $property->quantity }}</td>
                                        <td>{{ $property->unit_measure }}</td>
                                        <td>{{ number_format($property->unit_value, 2) }}</td>
                                        <td>{{ number_format($property->total_cost, 2) }}</td>
                                        <td>{{ $property->description }}</td>
                                        <td>{{ $property->inventory_item_no }}</td>
                                        <td>{{ $property->estimated_useful_life }}</td>
                                        <td>{{ $property->accountable_type }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="20">No properties found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    <p id="noResultsMessage" style="display: none; color: red; text-align: center;">No properties found.</p>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            <span>Showing {{ $properties->firstItem() }} to {{ $properties->lastItem() }} of {{ $properties->total() }} records</span>
                        </div>
                        <div>
                            <nav>
                                <ul class="pagination justify-content-center" style="gap: 5px;">
                                    @if ($properties->onFirstPage())
                                        <li class="page-item disabled"><span class="page-link" style="background-color: #ccc; border-radius: 5px;">Previous</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $properties->previousPageUrl() }}" style="color: white; background-color: #002C76; border-radius: 5px;">Previous</a></li>
                                    @endif

                                    @foreach ($properties->getUrlRange(1, $properties->lastPage()) as $page => $url)
                                        <li class="page-item {{ $page == $properties->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}" 
                                            style="{{ $page == $properties->currentPage() ? 'background-color: #FFDE15; color: black; border-radius: 5px;' : 'color: black; background-color: white; border-radius: 5px;' }}">
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @endforeach

                                    @if ($properties->hasMorePages())
                                        <li class="page-item"><a class="page-link" href="{{ $properties->nextPageUrl() }}" style="color: white; background-color: #002C76; border-radius: 5px;">Next</a></li>
                                    @else
                                        <li class="page-item disabled"><span class="page-link" style="background-color: #ccc; border-radius: 5px;">Next</span></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- JS Filter Logic -->
<script>
function toggleFilterDropdown() {
    var dropdown = document.getElementById("filterDropdown");
    dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
}

function filterTable() {
    let selectedValue = document.getElementById("inventoryTypeDropdown").value.toLowerCase();
    let tableBody = document.getElementById("table-body");
    let tableRows = tableBody.querySelectorAll("tr");
    let found = false;

    tableRows.forEach(row => {
        let filterColumnIndex = 7; // Inventory Type
        let cellToFilter = row.cells[filterColumnIndex];

        if (cellToFilter) {
            let cellText = cellToFilter.textContent.trim().toLowerCase();
            if (selectedValue === "" || cellText.includes(selectedValue)) {
                row.style.display = "";
                found = true;
            } else {
                row.style.display = "none";
            }
        } else {
            row.style.display = "none";
        }
    });

    let noDataRow = document.getElementById("noDataRow");
    if (noDataRow) {
        noDataRow.remove();
    }

    if (!found) {
        let newNoDataRow = document.createElement("tr");
        newNoDataRow.id = "noDataRow";
        newNoDataRow.innerHTML = `<td colspan="20" style="text-align: center; font-weight: bold;">No Property Found</td>`;
        tableBody.appendChild(newNoDataRow);
    }
}

function cancelFilter() {
    let tableBody = document.getElementById("table-body");
    let tableRows = tableBody.querySelectorAll("tr");

    tableRows.forEach(row => {
        row.style.display = "";
    });

    let noDataRow = document.getElementById("noDataRow");
    if (noDataRow) {
        noDataRow.remove();
    }

    document.getElementById("inventoryTypeDropdown").value = "";
}

// Filter listener
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("inventoryTypeDropdown").addEventListener("change", filterTable);
});
</script>
@endsection
