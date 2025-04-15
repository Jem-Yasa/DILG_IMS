@extends('layouts.admin_layout')

@section('title', 'Registry of Semi-Expendable Property Issued')

@section('contents')
<section class="section">
    <div class="card">
        <div class="card-body">
            <h3 class="mb-4">Registry of Semi-Expendable Property Issued</h3>
            <div class="container">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    <!-- Left Side: Show Records -->
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <label for="recordsPerPage" class="me-2">Show</label>
                        <select name="per_page" id="recordsPerPage" class="form-select form-select-sm me-2" style="width: 70px;" onchange="updateRecordsPerPage()">
                            <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        </select>
                        <span>records</span>
                    </div>

                    <!-- Search -->
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <label for="search">Search:</label>
                        <input type="text" id="search" onkeyup="filterTable()" 
                            style="width: 200px; height: 30px; border: 1px solid #ccc; 
                                    border-radius: 5px; padding: 5px 10px; font-size: 14px;">
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
                            <tr id="noDataRow" style="display: none;">
                                <td colspan="6" class="text-center text-danger">No matching records found.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                    <!-- Pagination -->
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
                                            <a class="page-link" href="{{ $properties->previousPageUrl() }}&per_page={{ request('per_page', 10) }}" style="color: white; background-color: #002C76; border-radius: 5px;">Previous</a>
                                        </li>
                                    @endif

                                    @foreach ($properties->getUrlRange(1, $properties->lastPage()) as $page => $url)
                                        <li class="page-item {{ $page == $properties->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}&per_page={{ request('per_page', 10) }}" 
                                            style="{{ $page == $properties->currentPage() ? 'background-color: #FFDE15; color: black; border-radius: 5px;' : 'color: black; background-color: white; border-radius: 5px;' }}">
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @endforeach

                                    @if ($properties->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $properties->nextPageUrl() }}&per_page={{ request('per_page', 10) }}" style="color: white; background-color: #002C76; border-radius: 5px;">Next</a>
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
    function updateRecordsPerPage() {
        const perPage = document.getElementById("recordsPerPage").value;
        const searchParams = new URLSearchParams(window.location.search);

        searchParams.set('per_page', perPage);
        searchParams.set('page', 1);

        window.location.search = searchParams.toString();
    }

    // SEARCH FUNCTION
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("search");
        const tableBody = document.getElementById("tableBody");
        const rows = tableBody.getElementsByTagName("tr");

        searchInput.addEventListener("keyup", function () {
            let searchText = searchInput.value.toLowerCase();
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

            let noDataRow = document.getElementById("noDataRow");
            if (noDataRow) {
                noDataRow.style.display = found ? "none" : "";
            }
        });
    });
</script>
@endsection
