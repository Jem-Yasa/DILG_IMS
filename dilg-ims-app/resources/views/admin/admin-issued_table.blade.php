@extends('layouts.admin_layout')

@section('title', 'Property Issued Table')

@section('contents')
    <section class="section">
        <div class="card">
            <div class="card-body"> 
                <h3 class="mb-4">Property Issued Table</h3>
                <div class="container mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  
                    <!-- Left: Show Records Dropdown -->
                    <div class="d-flex align-items-center">
                        <label for="recordsPerPage" class="me-2">Show</label>
                        <select id="recordsPerPage" class="form-select form-select-sm me-2" style="width: 70px; margin: 0 5px;" onchange="updateRecordsPerPage()">
                            <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        </select>
                        <span>records</span>
                    </div>

                    <!-- Right: Search, Create, and Filter Buttons -->
                    <div class="d-flex align-items-center">
                     <label for="search">Search:</label>
                        <input type="text" id="search" 
                            style="width: 200px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px 10px; font-size: 14px;">

                                <!-- Create Button -->
                                <a href="{{ route('admin-create') }}" class="btn btn-warning btn-sm me-2 d-flex align-items-center" 
                                    style="width: 130px; height: 40px; display: flex; align-items: center; justify-content: center; 
                                    background-color: #ffc107; font-weight: bold; border-radius: 8px; gap: 8px; text-decoration: none; border: none;
                                    margin-left: 10px;">  <!-- Added margin-left for spacing -->
                                    <svg width="20" height="20" fill="black" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 4a1 1 0 011 1v4h4a1 1 0 110 2h-4v4a1 1 0 11-2 0v-4H5a1 1 0 110-2h4V5a1 1 0 011-1z" clip-rule="evenodd"/>
                                    </svg>
                                    Create
                                </a>

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

                                    <!-- Property Type Filter -->
                                    <div id="filterDropdown" style="display: none; position: absolute; background: white; padding: 10px; border-radius: 5px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1); width: 200px; ">
                                    
                                        <!-- Dropdown with Non-Selectable Label -->
                                        <select id="propertyDropdown" class="form-select" style="width: 100%; padding: 5px;">
                                            <option value="select property type"disabled selected>Select Property Type</option> <!-- Non-Selectable Label -->
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

                    </div>
                </div>
                    <div class="table-responsive">
                    <table class="table table-bordered text-white" style="background-color: #002C76; text-align: center;">
                            <thead>
                                <tr>
                                    <th rowspan="2">Date</th>
                                    <th rowspan="2">ICS/IRSP No.</th>
                                    <th rowspan="2">Property Type</th>
                                    <th rowspan="2">Semi-expendable Property No.</th>
                                    <th rowspan="2">Semi-expendable Property</th>
                                    <th rowspan="2">Reference</th>
                                    <th rowspan="2">Item Description</th>
                                    <th rowspan="2">Estimated Useful life</th>
                                    <th colspan="2" style="color: black; background-color:#e4e4e4;">Issued</th>
                                    <th colspan="2" style="color: black; background-color:#e4e4e4;">Returned</th>
                                    <th colspan="2" style="color: black; background-color:#e4e4e4;">Re-Issued</th>
                                    <th rowspan="2">Disposal Qty</th>
                                    <th rowspan="2">Balance Qty</th>
                                    <th rowspan="2">Amount</th>
                                    <th rowspan="2">Remarks</th>
                                    <th rowspan="2">Action</th>
                                </tr>
                                <tr>
                                    <th>Qty</th>
                                    <th>Officer/Officers</th>
                                    <th>Qty</th>
                                    <th>Officer/Officers</th>
                                    <th>Qty</th>
                                    <th>Officer/Officer</th>
                                </tr>
                            </thead>
                            <tbody id="propertyTableBody" style="color: black; background-color:rgb(196, 196, 196);">
                            <!-- <tbody style="color: black; background-color:rgb(196, 196, 196);"> -->
                                @if($properties->count() > 0)    
                                @foreach($properties as $property)
                                    <tr>
                                        <td>{{ $property->date_acquired }}</td>
                                        <td>{{ $property->ics_rrsp_no }}</td>
                                        <td>{{ $property->property_type }}</td>
                                        <td>{{ $property->semi_expendable_no }}</td>
                                        <td>{{ $property->semi_expendable_name }}</td>
                                        <td>{{ $property->reference }}</td>
                                        <td>{{ $property->item_description }}</td>
                                        <td>{{ $property->estimated_useful_life }}</td>

                                        <!-- Issued Column -->
                                        <td>{{ $property->status == 'Issued' ? $property->quantity : '' }}</td>
                                        <td>{{ $property->status == 'Issued' ? $property->office_officer : '' }}</td>

                                        <!-- Returned Column -->
                                        <td>{{ $property->status == 'Returned' ? $property->quantity : '' }}</td>
                                        <td>{{ $property->status == 'Returned' ? $property->office_officer : '' }}</td>

                                        <!-- Re-Issued Column -->
                                        <td>{{ $property->status == 'Re-Issued' ? $property->quantity : '' }}</td>
                                        <td>{{ $property->status == 'Re-Issued' ? $property->office_officer : '' }}</td>
                                       
                                        <td></td> <!-- Disposal Qty -->
                                        <td></td> <!--Balance Qty -->
                                        <td>{{ $property->amount }}</td>
                                        <td>{{ $property->remarks }}</td>
                                        <td>
                                            <a href="{{ route('property.edit', $property->id) }}" class="btn btn-primary btn-sm" 
                                               style="width: 80px; height: 35px; text-align: center; margin-bottom: 5px;">Edit</a>
                                            <form action="{{ route('property.destroy', $property->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" 
                                                        style="width: 80px; height: 35px; text-align: center;" 
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="12">No properties found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>


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
    </section>
    
    <!-- javascript for paging -->
    <script>
        function updateTableRows() {
            let selectedValue = parseInt(document.getElementById("recordsPerPage").value);
            let tableRows = document.querySelectorAll("#propertyTableBody tr");

            tableRows.forEach((row, index) => {
                if (index < selectedValue) {
                    row.style.display = ""; // Show row
                } else {
                    row.style.display = "none"; // Hide row
                }
            });
        }

        // Ensure table updates on page load
        document.addEventListener("DOMContentLoaded", function () {
            updateTableRows();
        });
    </script>

    <script>
        function updateRecordsPerPage() {
            let selectedValue = document.getElementById("recordsPerPage").value;
            let currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('per_page', selectedValue);
            window.location.href = currentUrl.toString();
        }
    </script>

    <!-- filter -->
    <script>
        function toggleFilterDropdown() {
            var dropdown = document.getElementById("filterDropdown");
            dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
        }

        function filterTable() {
            var selectedProperty = document.getElementById("propertyDropdown").value.toLowerCase();
            var tableRows = document.querySelectorAll("#propertyTableBody tr");

            tableRows.forEach((row) => {
                var propertyTypeCell = row.cells[2];
                if (propertyTypeCell) {
                    var propertyType = propertyTypeCell.textContent.trim().toLowerCase();
                    if (selectedProperty === "select property type" || propertyType === selectedProperty) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                }
            });
        }

        document.getElementById("propertyDropdown").addEventListener("change", filterTable);
    </script>
@endsection