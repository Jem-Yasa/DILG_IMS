@extends('layouts.admin_layout')

@section('title', 'Registry of Semi-Expendable Property Issued')

@section('contents')
<section class="section">
    <div class="card">
        <div class="card-body">
            <h3 class="mb-4">Registry of Semi-Expendable Property Issued</h3>
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <label for="recordsPerPage" class="me-2">Show</label>
                        <select id="recordsPerPage" class="form-select form-select-sm me-2"
                            style="width: 70px; margin: 0 5px;" onchange="updateRecordsPerPage()">
                            <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        </select>
                        <span>records</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <label for="search" class="me-2">Search:</label>
                        <input type="text" id="search" style="width: 200px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px 10px; font-size: 14px;">
                        <div style="width: 10px;"></div>
                        <button id="filterButton" class="btn d-flex align-items-center"
                            style="width: 130px; height: 40px; font-weight: bold; border-radius: 5px; background-color: rgb(30, 194, 38); color: white; border: none; gap: 8px;"
                            onclick="toggleFilterDropdown()">
                            <svg width="20" height="20" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2.5a1 1 0 01-.293.707L11 12.914V17a1 1 0 01-.447.894l-2 1A1 1 0 017 18v-5.086L3.293 7.207A1 1 0 013 6.5V4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Filter
                        </button>
                        <div id="filterDropdown"
                            style="display: none; position: absolute; background: white; padding: 10px; border-radius: 5px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1); width: 250px;">
                            <select id="inventoryTypeDropdown" class="form-select">
                                <option value="" disabled selected>Select Article Inventory Type</option>
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
                            <button onclick="cancelFilter()"
                                style="background-color: #ff3b3b; color: white; border: none; padding: 10px; font-size: 16px; font-weight: bold; border-radius: 8px; cursor: pointer; width: 100%; height: 40px; text-align: center; margin-top: 3px;">
                                Cancel Filter
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-white text-center" style="background-color: #002f6c;">
                        <thead>
                            <tr>
                                <th rowspan="2">Date</th>
                                <th rowspan="2">ICS/PAR RRSP No.</th>
                                <th rowspan="2">Semi-expendable Property No.</th>
                                <th rowspan="2">Item Description</th>
                                <th rowspan="2">Estimated Useful Life</th>
                                <th colspan="2" style="color: black; background-color:#e4e4e4;">Issued</th>
                                <th colspan="2" style="color: black; background-color:#e4e4e4;">Returned</th>
                                <th colspan="2" style="color: black; background-color:#e4e4e4;">Re-Issued</th>
                                <th rowspan="2">Disposal Qty</th>
                                <th rowspan="2">Balance Qty</th>
                                <th rowspan="2">Amount</th>
                                <th rowspan="2">Remarks</th>
                            </tr>
                            <tr style="background-color: #002f6c;">
                                <th>Qty</th>
                                <th>Office/Officer</th>
                                <th>Qty</th>
                                <th>Office/Officers</th>
                                <th>Qty</th>
                                <th>Office/Officer</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" style="color: black; background-color: rgb(196, 196, 196);">
                            @if($properties->count() > 0)
                            @foreach($properties as $property)
                            <tr>
                                <td>{{ $property->date_acquired }}</td>
                                <td>{{ $property->ics_rrsp_no }}</td>
                                <td>{{ $property->inventory_item_no }}</td>
                                <td>{{ $property->description }}</td>
                                <td>{{ $property->estimated_useful_life }}</td>
                                <td>{{ $property->status == 'Issued' ? $property->quantity : '' }}</td>
                                <td>{{ $property->status == 'Issued' ? $property->accountable_officer : '' }}</td>
                                <td>{{ $property->status == 'Returned' ? $property->quantity : '' }}</td>
                                <td>{{ $property->status == 'Returned' ? $property->accountable_officer : '' }}</td>
                                <td>{{ $property->status == 'Re-Issued' ? $property->quantity : '' }}</td>
                                <td>{{ $property->status == 'Re-Issued' ? $property->accountable_officer : '' }}</td>
                                <td></td>
                                <td></td>
                                <td>{{ number_format($property->total_cost, 2) }}</td>
                                <td>{{ $property->remarks }}</td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                 <td colspan="20">No properties found.</td>
                               </tr>
                            @endif
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("search");
        const filterDropdown = document.getElementById("inventoryTypeDropdown");
        const tableBody = document.getElementById("tableBody");
        const rows = tableBody.getElementsByTagName("tr");

        // SEARCH FUNCTION
        searchInput.addEventListener("keyup", function () {
            let searchText = searchInput.value.toLowerCase();
            let noDataRow = document.getElementById("noDataRow");
            let found = false;

            for (let i = 0; i < rows.length; i++) {
                let row = rows[i];
                let textContent = row.textContent.toLowerCase();

                if (textContent.includes(searchText)) {
                    row.style.display = "";
                    found = true;
                } else {
                    row.style.display = "none";
                }
            }

            // Show "No Data Found" if no rows match the search
            if (noDataRow) {
                noDataRow.style.display = found ? "none" : "";
            }
        });

        // FILTER FUNCTION
        filterDropdown.addEventListener("change", function () {
            let selectedType = filterDropdown.value.toLowerCase();
            let noDataRow = document.getElementById("noDataRow");
            let found = false;

            for (let i = 0; i < rows.length; i++) {
                let row = rows[i];
                let itemDescription = row.cells[3]?.textContent.toLowerCase() || "";

                if (itemDescription.includes(selectedType) || selectedType === "") {
                    row.style.display = "";
                    found = true;
                } else {
                    row.style.display = "none";
                }
            }

            if (noDataRow) {
                noDataRow.style.display = found ? "none" : "";
            }
        });

        // FILTER DROPDOWN TOGGLE
        function toggleFilterDropdown() {
            let dropdown = document.getElementById("filterDropdown");
            dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
        }

        function cancelFilter() {
            filterDropdown.value = "";
            filterDropdown.dispatchEvent(new Event("change")); // Trigger filter reset
            document.getElementById("filterDropdown").style.display = "none";
        }

        window.toggleFilterDropdown = toggleFilterDropdown;
        window.cancelFilter = cancelFilter;
    });
</script>

@endsection
