@extends('layouts.admin_layout') 

@section('title', 'Semi-Expandable Property Card')

@section('contents')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h3 class="mb-4">Semi-Expandable Property Card</h3>
                    <!-- Controls Container -->
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <!-- Left Side: Show Records -->
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

                        <!-- Right Side: Search and Filter -->
                        <div style="display: flex; align-items: center; gap: 10px; position: relative;">
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
                                    gap: 8px; text-decoration: none;" onclick="toggleFilterDropdown()">
                                <svg width="20" height="20" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2.5a1 1 0 01-.293.707L11 12.914V17a1 1 0 01-.447.894l-2 1A1 1 0 017 18v-5.086L3.293 7.207A1 1 0 013 6.5V4z" clip-rule="evenodd"/>
                                </svg>
                                Filter
                            </button>

                            <!-- Filter Dropdown -->
                                <div id="filterDropdown" style="display: none; position: absolute; top: 45px; right: 0; background: white; padding: 10px; border-radius: 5px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1); width: 250px;">
                                    <select id="inventoryTypeDropdown" class="form-select" style="width: 100%; padding: 5px;" onchange="filterTable()">
                                        <option value="" disabled selected>Inventory Type</option>
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

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered text-white" style="background-color: #002C76; text-align: center;">
                            <thead>
                                <tr>
                                    <th rowspan="2">Date</th>
                                    <th rowspan="2">Reference</th>
                                    <th colspan="3" style="background-color: #D3D3D3; color: black;">Receipt</th>
                                    <th rowspan="2">Semi-Expendable Property No.</th>
                                    <th rowspan="2">Semi-Expendable Property</th>
                                    <th rowspan="2">Description</th>
                                    <th colspan="3" style="background-color: #D3D3D3; color: black;">Issue/Transfer/Disposal</th>
                                    <th rowspan="2">Balance Qty</th>
                                    <th rowspan="2">Amount</th>
                                    <th rowspan="2">Remarks</th>
                                </tr>
                                <tr>
                                    <th>Qty</th>
                                    <th>Unit Value</th>
                                    <th>Total Cost</th>
                                    <th>Item No.</th>
                                    <th>Qty</th>
                                    <th>Office/Officer</th>
                                </tr>
                            </thead>
                            <tbody style="color: black; background-color: rgb(196, 196, 196);" id="table-body">
                                @forelse($properties as $property)
                                    <tr data-type="{{ $property->accountable_type }}">
                                        <td>{{ $property->date_acquired }}</td>
                                        <td>{{ $property->ics_rrsp_no }}</td>
                                        <td>{{ $property->quantity }}</td>
                                        <td>{{ number_format($property->unit_value, 2) }}</td>
                                        <td>{{ number_format($property->total_cost, 2) }}</td>
                                        <td>{{ $property->semi_expendable_property }}</td>
                                        <td>{{ $property->accountable_type }}</td>
                                        <td>{{ $property->description }}</td>
                                        <td>{{ $property->status == 'Issued' ? $property->quantity : '' }}</td>
                                        <td>{{ $property->status == 'Issued' ? $property->accountable_officer : '' }}</td>
                                        <td>{{ $property->status == 'Issued' ? $property->accountable_officer : '' }}</td>
                                        <td>{{ $property->balance_qty }}</td>
                                        <td>{{ number_format($property->total_cost, 2) }}</td>
                                        <td>{{ $property->remarks }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="14">No properties found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                                
                        <!-- No Results Message -->
                        <p id="noResultsMessage" style="display: none; color: red; text-align: center;">No properties found.</p>
                      
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
    // Filter function that filters the table based on search and filter value
    function filterTable() {
        let searchInput = document.getElementById("search").value.toLowerCase();
        let filterValue = document.getElementById("inventoryTypeDropdown").value.toLowerCase(); // Adjusted to lowercase comparison
        let rows = document.querySelectorAll("#table-body tr");
        let anyVisible = false;

        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            let type = row.getAttribute("data-type").toLowerCase(); // Ensure the type is compared case-insensitively

            // Matching the search input and filter value
            let matchesSearch = text.includes(searchInput);
            let matchesFilter = (filterValue === "" || type.includes(filterValue)); // Case-insensitive comparison

            if (matchesSearch && matchesFilter) {
                row.style.display = "";
                anyVisible = true;
            } else {
                row.style.display = "none";
            }
        });

        // Display 'No results' message if no rows match the filters
        if (!anyVisible) {
            document.getElementById("noResultsMessage").style.display = "block";
        } else {
            document.getElementById("noResultsMessage").style.display = "none";
        }
    }

    function toggleFilterDropdown() {
        let dropdown = document.getElementById("filterDropdown");
        dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
    }

    function cancelFilter() {
        document.getElementById("inventoryTypeDropdown").value = ""; // Clear filter dropdown
        document.getElementById("search").value = ""; // Clear search input
        filterTable(); // Apply the cleared filters
        document.getElementById("filterDropdown").style.display = "none"; // Hide filter dropdown
    }

    function submitFilterForm() {
        let perPageValue = document.getElementById("recordsPerPage").value;
        window.location.href = `?per_page=${perPageValue}`; // Adjust URL with per_page query param
    }

    window.onload = function() {
        filterTable(); // Call filterTable on page load to apply initial filters
    }
</script>

@endsection
