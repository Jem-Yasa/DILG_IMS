@extends('layouts.admin_layout')

@section('title', 'Semi-Expandable Property Ledger Card')

@section('contents')
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                    <h3 class="mb-4">Semi-Expandable Property Ledger Card</h3>
                    
                <!-- Search & Filter Container -->
                <div style="display: flex; justify-content: flex-end; align-items: center; gap: 10px; margin-bottom: 10px; position: relative;">
                    <!-- Search Bar -->
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <label for="search">Search:</label>
                        <input type="text" id="search" onkeyup="filterTable()" 
                               style="width: 200px; height: 30px; border: 1px solid #ccc; 
                                      border-radius: 5px; padding: 5px 10px; font-size: 14px;">
                    </div>

                    <!-- Filter Button -->
                    <button id="filterButton" class="btn d-flex align-items-center" 
                            style="width: 130px; height: 40px; display: flex; align-items: center; justify-content: center; 
                            font-weight: bold; border-radius: 5px; background-color: rgb(30, 194, 38); color: white; border: none; 
                            gap: 8px; text-decoration: none;"
                            onclick="toggleFilterDropdown()">
                        <svg width="20" height="20" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2.5a1 1 0 01-.293.707L11 12.914V17a1 1 0 01-.447.894l-2 1A1 1 0 017 18v-5.086L3.293 7.207A1 1 0 013 6.5V4z" clip-rule="evenodd"/>
                        </svg>
                        Filter
                    </button>

                    <!-- Filter Dropdown -->
                    <div id="filterDropdown" style="display: none; position: absolute; top: 45px; right: 0; background: white; padding: 10px; border-radius: 5px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1); width: 250px;">
                        <select id="inventoryTypeDropdown" class="form-select" style="width: 100%; padding: 5px;" onchange="filterTable()">
                            <option value="" selected>All Inventory Types</option>
                            <option value="" disabled>── SEMI-EXPENDABLE PROPERTIES HIGH VALUE ──</option>
                            <option value="ICT Equipment HV">ICT Equipment</option>
                            <option value="Office Equipment HV">Office Equipment</option>
                            <option value="Furniture & Fixture HV">Furniture & Fixture</option>
                            <option value="Communication HV">Communication</option>
                            <option value="Books HV">Books HV</option>
                            <option value="" disabled>── SEMI-EXPENDABLE PROPERTIES LOW VALUE ──</option>
                            <option value="ICT Equipment LV">ICT Equipment</option>
                            <option value="Office Equipment LV">Office Equipment</option>
                            <option value="Furniture & Fixture LV">Furniture & Fixture</option>
                            <option value="Communication LV">Communication</option>
                            <option value="Books LV">Books LV</option>
                        </select>

                        <!-- Cancel Filter Button -->
                        <button onclick="cancelFilter()" style="background-color: #ff3b3b; color: white; border: none; padding: 10px; font-size: 16px; font-weight: bold; border-radius: 8px; cursor: pointer; width: 100%; height: 40px; text-align: center; margin-top: 3px;">
                            Cancel Filter
                        </button>
                    </div>
                </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                    <thead>
                        <tr style="background-color: #002F6C; color: white;">
                            <th rowspan="2">Date</th>
                            <th rowspan="2">Reference</th>
                            <th colspan="3" class="text-center" style="background-color: #e4e4e4; color: black;">Receipt</th>
                            <th rowspan="2">Issued/Transfers/Adjustment/s</th>
                            <th rowspan="2">Semi-expendable Property</th>
                            <th rowspan="2">Description</th>
                            <th rowspan="2">Semi-expendable Property No.</th>
                            <th rowspan="2">UACS Object Code</th>
                            <th rowspan="2">Accumulated Impairment Losses</th>
                            <th rowspan="2">Adjusted Cost</th>
                            <th colspan="2" class="text-center" style="background-color: #e4e4e4; color: black;">Repair History</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr style="background-color: #002F6C; color: white;">
                            <th>Qty</th>
                            <th>Unit Cost</th>
                            <th>Total Cost</th>
                            <th>Nature of Repair</th>
                            <th>Amount</th>
                        </tr>
                    </thead>

                        <tbody id="propertyTableBody" style="color: black; background-color: rgb(196, 196, 196);">
                            @foreach ($properties as $property)
                                <tr>
                                    <td>{{ $property->date_acquired }}</td>
                                    <td>{{ $property->ics_rrsp_no }}</td>

                                    <!-- Receipt -->
                                    <td>{{ $property->quantity }}</td>
                                    <td>{{ number_format($property->unit_value, 2) }}</td>
                                    <td>{{ number_format($property->total_cost, 2) }}</td>
                                    <td>{{ $property->issued_qty ?? '-' }}</td>
                                    <td>{{ $property->accountable_type }}</td>
                                    <td>{{ $property->description }}</td>
                                    <td>{{ $property->inventory_item_no }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    

                                    <!-- Repair History -->
                                    <td>{{ $property->nature_of_repair ?? '-' }}</td>
                                    <td>{{ number_format($property->repair_amount ?? 0, 2) }}</td>

                                    <!-- Actions -->
                                    <td>
                                        <a href="{{ route('property.edit', $property->id) }}" class="btn btn-primary btn-sm" 
                                            style="width: 80px; height: 35px; text-align: center; margin-bottom: 5px;">Edit</a>
                                        
                                        <button type="button" class="btn btn-danger btn-sm" 
                                                style="width: 80px; height: 35px; text-align: center;" 
                                                onclick="openDeleteModal(this)" 
                                                data-id="{{ $property->id }}"
                                                data-date="{{ $property->date_acquired }}" 
                                                data-ics="{{ $property->ics_rrsp_no }}" 
                                                data-accountable="{{ $property->accountable_type }}" 
                                                data-article="{{ $property->article }}" 
                                                data-description="{{ $property->description }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                   <!-- Pagination Section -->
                   <div class="d-flex justify-content-between align-items-center mt-3">
                            <div>
                                <span>Showing {{ $properties->firstItem() }} to {{ $properties->lastItem() }} of {{ $properties->total() }} records</span>
                                </div>
                                <div>
                                <nav>
                                    <ul class="pagination justify-content-center" style="gap: 5px;">
                                        @if ($properties->onFirstPage())
                                            <li class="page-item disabled">
                                                <span class="page-link" style="background-color: #ccc; border-radius: 5px;">Previous</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $properties->previousPageUrl() }}" style="color: white; background-color: #002C76; border-radius: 5px;">Previous</a>
                                            </li>
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
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $properties->nextPageUrl() }}" style="color: white; background-color: #002C76; border-radius: 5px;">Next</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <span class="page-link" style="background-color: #ccc; border-radius: 5px;">Next</span>
                                            </li>
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

    <!-- filter -->
    <script>
    function filterTable() {
        let searchInput = document.getElementById("search").value.toLowerCase();
        let filterValue = document.getElementById("inventoryTypeDropdown").value;
        let rows = document.querySelectorAll("#table-body tr");
        let noResultsMessage = document.getElementById("noResultsMessage");
        let anyVisible = false;

        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            let type = row.getAttribute("data-type");
            
            let matchesSearch = text.includes(searchInput);
            let matchesFilter = (filterValue === "" || type === filterValue);

            if (matchesSearch && matchesFilter) {
                row.style.display = "";
                anyVisible = true;
            } else {
                row.style.display = "none";
            }
        });

        // Show "No Property Found" message if no results match
        noResultsMessage.style.display = anyVisible ? "none" : "block";
    }

    function toggleFilterDropdown() {
        let dropdown = document.getElementById("filterDropdown");
        dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
    }

    function cancelFilter() {
        document.getElementById("inventoryTypeDropdown").value = "";
        filterTable();
        document.getElementById("filterDropdown").style.display = "none";
    }
    </script>
@endsection
