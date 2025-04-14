@extends('layouts.admin_layout')

@section('title', 'Propert Acknowledgment Receipt ')

@section('contents')
<section class="section">
    <div class="card">
        <div class="card-body">
            <h3 class="mb-4">Propert Acknowledgment Receipt</h3>
            <div class="container">

                <!-- Top Row: Show Records & Search -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Left: Show Records Dropdown -->
                    <div class="d-flex align-items-center">
                        <label for="recordsPerPage" class="me-2">Show</label>
                        <select id="recordsPerPage" class="form-select form-select-sm me-2"
                            style="width: 70px; margin: 0 5px;" onchange="updateRecordsPerPage()">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                        <span>records</span>
                    </div>

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
                                            

                        <!-- Inventory Type Filter -->
                        <div id="filterDropdown" style="display: none; position: absolute; background: white; padding: 10px; border-radius: 5px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1); width: 250px;">
                            <select id="inventoryTypeDropdown" class="form-select" style="width: 100%; padding: 5px;">
                                <option value="" disabled selected>Select Article Inventory Type</option> <!-- Non-Selectable Label -->
                                <option value="" disabled>── SEMI-EXPENDABLE PROPERTIES HIGH VALUE ──</option> <!-- Non-Selectable Label -->
                                <option value="ICT Equipment HV">ICT Equipment</option>
                                <option value="Office Equipment HV">Office Equipment</option>
                                <option value="Furniture & Fixture HV">Furniture & Fixture</option>
                                <option value="Communication HV">Communication</option>
                                <option value="Books HV">Books HV</option>
                                <option value="" disabled>── SEMI-EXPENDABLE PROPERTIES LOW VALUE ──</option> <!-- Non-Selectable Label -->
                                <option value="ICT Equipment LV">ICT Equipment</option>
                                <option value="Office Equipment LV">Office Equipment</option>
                                <option value="Furniture & Fixture LV">Furniture & Fixture</option>
                                <option value="Communication LV">Communication</option>
                                <option value="Books LV">Books LV</option>
                            </select>

                                    <button onclick="cancelFilter()" style="background-color: #ff3b3b; color: white; border: none; padding: 10px; font-size: 16px; font-weight: bold; border-radius: 8px; cursor: pointer; width: 100%; height: 40px; text-align: center; margin-top: 3px;">
                                        Cancel Filter
                                    </button>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-bordered text-white text-center" style="background-color: #002f6c;">
                        <thead>
                            <tr>
                                <th>Quantity</th>
                                <th>Unit Cost</th>
                                <th>Description</th>
                                <th>Semi-expendable Property No.</th>
                                <th>Date Acquired</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" style="color: black; background-color: rgb(196, 196, 196);">
                            @foreach($properties as $property)
                            <tr>
                                <td>{{ $property->quantity }}</td>
                                <td>{{ $property->unit_measure }}</td>
                                <td>{{ $property->description }}</td>
                                <td>{{ $property->inventory_item_no }}</td>
                                <td>{{ $property->date_acquired }}</td>
                                <td>{{ number_format($property->total_cost, 2) }}</td>
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

<script>
function filterTable() {
    let searchValue = document.getElementById("search").value.toLowerCase();
    let filterValue = document.getElementById("inventoryTypeDropdown").value;
    let table = document.getElementById("tableBody");
    let rows = table.getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {
        let cells = rows[i].getElementsByTagName("td");
        let matchSearch = searchValue === "" || cells[3].innerText.toLowerCase().includes(searchValue);
        let matchFilter = filterValue === "" || cells[3].innerText.includes(filterValue);
        rows[i].style.display = matchSearch && matchFilter ? "" : "none";
    }
}

function toggleFilterDropdown() {
    let filterDropdown = document.getElementById("filterDropdown");
    filterDropdown.style.display = filterDropdown.style.display === "none" ? "block" : "none";
}

function cancelFilter() {
    document.getElementById("inventoryTypeDropdown").value = "";
    filterTable();
}
</script>
@endsection
