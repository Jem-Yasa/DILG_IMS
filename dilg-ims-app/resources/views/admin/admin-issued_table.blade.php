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

                        <!-- Right: Search, and Filter Buttons -->
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

                                        <style>
                                            .cancel-button {
                                            background-color: #dc3545; /* Red */
                                            color: white;
                                        }

                                        .cancel-button:hover {
                                            background-color: #c82333; /* Darker Red on Hover */
                                        }
                                        </style>

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
                        <div class="table-responsive">
                        <table class="table table-bordered text-white" style="background-color: #002C76; text-align: center;">
                            <thead>
                                <tr>
                                    <th rowspan="2">Date</th>
                                    <th rowspan="2">Office</th>
                                    <th rowspan="2">ICS/RRSP No.</th>
                                    <th rowspan="2">Accountable type</th>
                                    <th rowspan="2">Value</th>
                                    <th rowspan="2">Article</th>
                                    <th rowspan="2">Description</th>
                                    <th rowspan="2">Unit of Measure</th>
                                    <th rowspan="2">Unit Value</th>
                                    <th rowspan="2">Total Cost</th>
                                    <th rowspan="2">Inventory Item No.</th>
                                    <th rowspan="2">Estimated Useful Life</th>
                                    <th colspan="2" style="color: black; background-color:#e4e4e4;">Issued</th>
                                    <th colspan="2" style="color: black; background-color:#e4e4e4;">Returned</th>
                                    <th colspan="2" style="color: black; background-color:#e4e4e4;">Re-Issued</th>
                                    <th rowspan="2">Disposal Qty</th>
                                    <th rowspan="2">Balance Qty</th>
                                    <th rowspan="2">Remarks</th>
                                    <th rowspan="2">Action</th>
                                </tr>
                                <tr>
                                    <th>Qty</th>
                                    <th>Accountable Officer</th>
                                    <th>Qty</th>
                                    <th>Accountable Officer</th>
                                    <th>Qty</th>
                                    <th>Accountable Officer</th>
                                </tr>
                            </thead>
                            <tbody id="propertyTableBody" style="color: black; background-color: rgb(196, 196, 196);">
                                @if($properties->count() > 0)    
                                    @foreach($properties as $property)
                                        <tr>
                                            <td>{{ $property->date_acquired }}</td>
                                            <td>{{ $property->office }}</td>
                                            <td>{{ $property->ics_rrsp_no }}</td>
                                            <td>{{ $property->accountable_type }}</td>
                                            <td>{{ $property->value }}</td>
                                            <td>{{ $property->article }}</td>
                                            <td>{{ $property->description }}</td>
                                            <td>{{ $property->unit_measure }}</td>
                                            <td>{{ number_format($property->unit_value, 2) }}</td>
                                            <td>{{ number_format($property->total_cost, 2) }}</td>
                                            <td>{{ $property->inventory_item_no }}</td>
                                            <td>{{ $property->estimated_useful_life }}</td>

                                            <!-- Issued Column -->
                                            <td>{{ $property->status == 'Issued' ? $property->quantity : '' }}</td>
                                            <td>{{ $property->status == 'Issued' ? $property->accountable_officer : '' }}</td>

                                            <!-- Returned Column -->
                                            <td>{{ $property->status == 'Returned' ? $property->quantity : '' }}</td>
                                            <td>{{ $property->status == 'Returned' ? $property->accountable_officer : '' }}</td>

                                            <!-- Re-Issued Column -->
                                            <td>{{ $property->status == 'Re-Issued' ? $property->quantity : '' }}</td>
                                            <td>{{ $property->status == 'Re-Issued' ? $property->accountable_officer : '' }}</td>
                                            
                                            <td></td> <!-- Balance Qty -->
                                            <td></td> <!-- Balance Qty -->
                                            <td>{{ $property->remarks }}</td>
                                            <td>
                                                <a href="{{ route('property.edit', $property->id) }}" class="btn btn-primary btn-sm" 
                                                    style="width: 80px; height: 35px; text-align: center; margin-bottom: 5px;">Edit</a>
                                                <form action="{{ route('property.destroy', $property->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- DELETE BUTTON (Inside a table row) -->
                                                    <button type="button" class="btn btn-danger btn-sm" 
                                                            style="width: 80px; height: 35px; text-align: center;" 
                                                            onclick="openDeleteModal(this)" 
                                                            data-date="{{ $property->date }}" 
                                                            data-ics="{{ $property->ics_rrsp_no }}" 
                                                            data-accountable="{{ $property->accountable_type }}" 
                                                            data-article="{{ $property->article }}" 
                                                            data-description="{{ $property->description }}">
                                                        Delete
                                                    </button>


                                                <!-- CONFIRMATION MODAL -->
                                                    <div id="deleteModal" class="modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); justify-content: center; align-items: center;">
                                                        <div style="background: white; padding: 20px; border-radius: 10px; width: 400px; position: relative;">
                                                            <h2 style="font-weight: bold; text-align: center;">CONFIRM CANCELLATION</h2>

                                                            <!-- Close Button (X) -->
                                                            <span onclick="closeDeleteModal()" style="position: absolute; top: 10px; right: 15px; font-size: 18px; cursor: pointer;">&times;</span>

                                                            <div style="text-align: left; margin-top: 10px;">
                                                                <p><strong>Date:</strong> <span id="modalDate"></span></p>
                                                                <p><strong>ICS/RRSP No.:</strong> <span id="modalICS"></span></p>
                                                                <p><strong>Accountable Type:</strong> <span id="modalAccountable"></span></p>
                                                                <p><strong>Article:</strong> <span id="modalArticle"></span></p>
                                                                <p><strong>Description:</strong> <span id="modalDescription"></span></p>

                                                                <label><strong>Reason:</strong></label>
                                                                <select id="reasonSelect" class="form-control" style="width: 100%; padding: 8px; margin-bottom: 10px;" onchange="toggleOtherReason()">
                                                                    <option value="" disabled selected>Select Reason</option>
                                                                    <option value="Damaged">Damaged</option>
                                                                    <option value="Lost">Lost</option>
                                                                    <option value="Other">Other</option>
                                                                </select>

                                                                <div id="otherReasonContainer" style="display: none;">
                                                                    <label><strong>Others:</strong></label>
                                                                    <input type="text" id="otherReason" class="form-control" style="width: 100%; padding: 8px; margin-bottom: 10px;">
                                                                </div>
                                                            </div>

                                                            <div style="display: flex; justify-content: space-between;">
                                                                <button onclick="confirmDelete()" style="background-color: #28a745; color: white; border: none; padding: 10px 20px; font-size: 16px; border-radius: 5px; cursor: pointer;">Confirm</button>
                                                                <button onclick="closeDeleteModal()" style="background-color: #6c757d; color: white; border: none; padding: 10px 20px; font-size: 16px; border-radius: 5px; cursor: pointer;">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="20">No properties found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        </div>
                    
                       <!-- Pagination Section -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div>
                                <nav>
                                    <ul class="pagination" style="gap: 5px;">
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
                            <div>
                                <span>Showing {{ $properties->firstItem() }} to {{ $properties->lastItem() }} of {{ $properties->total() }} records</span>
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
            let selectedValue = document.getElementById("inventoryTypeDropdown").value.toLowerCase();
            let tableBody = document.getElementById("propertyTableBody");
            let tableRows = tableBody.querySelectorAll("tr");
            let found = false; // To track if any row is visible

            tableRows.forEach(row => {
                let inventoryTypeCell = row.cells[3]; // Adjusted to the correct column index (4th column, zero-based index is 3)
                
                if (inventoryTypeCell) {
                    let inventoryText = inventoryTypeCell.textContent.trim().toLowerCase();
                    
                    if (selectedValue === "" || inventoryText.includes(selectedValue)) {
                        row.style.display = ""; // Show row
                        found = true;
                    } else {
                        row.style.display = "none"; // Hide row
                    }
                }
            });

            // Remove existing "No Property Found" row if present
            let noDataRow = document.getElementById("noDataRow");
            if (noDataRow) {
                noDataRow.remove();
            }

            // If no matching rows are found, insert a "No Property Found" row
            if (!found) {
                let noDataMessage = document.createElement("tr");
                noDataMessage.id = "noDataRow";
                noDataMessage.innerHTML = `<td colspan="20" style="text-align: center; font-weight: bold;">No Property Found</td>`;
                tableBody.appendChild(noDataMessage);
            }
        }

        function cancelFilter() {
            let tableBody = document.getElementById("propertyTableBody");
            let tableRows = tableBody.querySelectorAll("tr");

            // Show all rows again
            tableRows.forEach(row => {
                row.style.display = "";
            });

            // Remove "No Property Found" message if present
            let noDataRow = document.getElementById("noDataRow");
            if (noDataRow) {
                noDataRow.remove();
            }

            // Reset dropdown selection
            document.getElementById("inventoryTypeDropdown").value = "";
        }

        // Attach event listener to the correct dropdown
        document.getElementById("inventoryTypeDropdown").addEventListener("change", filterTable);
    </script>

    <!-- Search function -->
     <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("search").addEventListener("input", function () {
                let searchValue = this.value.toLowerCase();
                let tableRows = document.querySelectorAll("#propertyTableBody tr");
                let found = false; // Track if any row is visible

                tableRows.forEach(row => {
                    let cells = row.querySelectorAll("td");
                    let rowContainsSearchText = Array.from(cells).some(cell => 
                        cell.textContent.toLowerCase().includes(searchValue)
                    );

                    if (rowContainsSearchText) {
                        row.style.display = ""; // Show row
                        found = true;
                    } else {
                        row.style.display = "none"; // Hide row
                    }
                });

                // Remove existing "No Property Found" row if present
                let noDataRow = document.getElementById("noDataRow");
                if (noDataRow) {
                    noDataRow.remove();
                }

                // If no matching rows are found, insert a "No Property Found" row
                if (!found) {
                    let noDataMessage = document.createElement("tr");
                    noDataMessage.id = "noDataRow";
                    noDataMessage.innerHTML = `<td colspan="20" style="text-align: center; font-weight: bold;">No Property Found</td>`;
                    document.getElementById("propertyTableBody").appendChild(noDataMessage);
                }
            });
        });
     </script>


<!-- Script Modal -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
    loadHistoryRecords(); // Load history records on page load

    // Attach event listener for the reason dropdown
    document.getElementById("reasonSelect").addEventListener("change", toggleOtherReason);
});

function openDeleteModal(button) {
    var modal = document.getElementById("deleteModal");

    // Store button reference in modal dataset
    modal.dataset.button = button;

    // Get attributes
    var date = button.getAttribute("data-date") || new Date().toISOString().split('T')[0];
    var ics = button.getAttribute("data-ics") || "N/A";
    var accountable = button.getAttribute("data-accountable") || "N/A";
    var article = button.getAttribute("data-article") || "N/A";
    var description = button.getAttribute("data-description") || "N/A";

    // Populate modal fields
    document.getElementById("modalDate").innerText = date;
    document.getElementById("modalICS").innerText = ics;
    document.getElementById("modalAccountable").innerText = accountable;
    document.getElementById("modalArticle").innerText = article;
    document.getElementById("modalDescription").innerText = description;

    // Reset reason dropdown and hide the "Other" text box
    document.getElementById("reasonSelect").value = "";
    document.getElementById("otherReasonContainer").style.display = "none";
    document.getElementById("otherReason").value = "";

    // Show modal
    modal.style.display = "flex";
    modal.style.backgroundColor = "rgba(0,0,0,0.5)";
}

function closeDeleteModal() {
    document.getElementById("deleteModal").style.display = "none";
}

// Function to show input box when "Other" is selected
function toggleOtherReason() {
    var reasonSelect = document.getElementById("reasonSelect");
    var otherReasonContainer = document.getElementById("otherReasonContainer");

    if (reasonSelect.value === "Other") {
        otherReasonContainer.style.display = "block";
    } else {
        otherReasonContainer.style.display = "none";
        document.getElementById("otherReason").value = ""; // Clear the input when not needed
    }
}

function confirmDelete() {
    var modal = document.getElementById("deleteModal");
    var button = modal.dataset.button; // Retrieve button reference

    if (!button) {
        alert("Error: No record selected!");
        return;
    }

    // Get the selected reason
    var reasonSelect = document.getElementById("reasonSelect").value;
    var otherReason = document.getElementById("otherReason").value;
    var finalReason = reasonSelect === "Other" ? otherReason : reasonSelect;

    if (!finalReason) {
        alert("Please select or enter a reason before confirming.");
        return;
    }

    // Find the row that contains the delete button
    var row = button.closest("tr");
    if (!row) {
        alert("Error: Unable to find record!");
        return;
    }

    // Extract data from the row
    var cells = row.getElementsByTagName("td");
    var record = {
        date: new Date().toISOString().split('T')[0], // Store current date as deleted date
        ics: cells[1].innerText,
        accountable: cells[2].innerText,
        article: cells[3].innerText,
        description: cells[4].innerText,
        reason: finalReason
    };

    // Save to localStorage for persistence
    saveToHistory(record);

    // Remove the row from the main table
    row.remove();

    // Close the modal
    closeDeleteModal();

    // Show success message
    alert("Record moved to history successfully!");
}

function saveToHistory(record) {
    let historyRecords = JSON.parse(localStorage.getItem("historyRecords")) || [];
    historyRecords.push(record);
    localStorage.setItem("historyRecords", JSON.stringify(historyRecords));

    // Update the History table
    updateHistoryTable();
}

function loadHistoryRecords() {
    let historyRecords = JSON.parse(localStorage.getItem("historyRecords")) || [];
    updateHistoryTable(historyRecords);
}

function updateHistoryTable() {
    let historyRecords = JSON.parse(localStorage.getItem("historyRecords")) || [];
    let historyTable = document.querySelector("#historyTable tbody");

    if (!historyTable) return;

    // Clear existing table rows
    historyTable.innerHTML = "";

    // Append records to table
    historyRecords.forEach(record => {
        let row = `<tr>
            <td>${record.date}</td>
            <td>${record.ics}</td>
            <td>${record.accountable}</td>
            <td>${record.article}</td>
            <td>${record.description}</td>
            <td>${record.reason}</td>
        </tr>`;
        historyTable.innerHTML += row;
    });
}

</script>



@endsection