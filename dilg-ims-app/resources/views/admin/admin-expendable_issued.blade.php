@extends('layouts.admin_layout')

@section('title', 'Reports of Semi-Expendable Issued')

@section('contents')
    <section class="section">
        <div class="card">
            <div class="card-body"> 
                <div class="container">
                    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                        <h3 class="mb-4">Reports of Semi-Expendable Issued</h3>
                        <div style="display: flex; align-items: center; gap: 5px;">
                            <!-- Search Input -->
                            <label for="search">Search:</label>
                            <input type="text" id="search" style="width: 200px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px 10px; font-size: 14px;">
                            
                            <!-- Filter Button -->
                            <button id="filterButton" class="btn d-flex align-items-center" style="width: 130px; height: 40px; font-weight: bold; border-radius: 5px; background-color: rgb(30, 194, 38); color: white; border: none; gap: 8px;">
                                <svg width="20" height="20" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2.5a1 1 0 01-.293.707L11 12.914V17a1 1 0 01-.447.894l-2 1A1 1 0 017 18v-5.086L3.293 7.207A1 1 0 013 6.5V4z" clip-rule="evenodd"/>
                                </svg>
                                Filter
                            </button>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered text-white" style="background-color: #002C76;">
                            <thead>
                                <tr>
                                    <th>ICS No.</th>
                                    <th>Responsibility Center Code</th>
                                    <th>Semi-expendable Property No.</th>
                                    <th>Item Description</th>
                                    <th>Unit</th>
                                    <th>Quantity Issued</th>
                                    <th>Unit Cost</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody style="color: black; background-color: rgb(196, 196, 196);">
                                @if(count($properties) > 0)
                                    @foreach ($properties as $property)
                                        <tr>
                                            <td>{{ $property->ics_rrsp_no }}</td>
                                            <td>{{ $property->responsibility_center_code ?? 'N/A' }}</td>
                                            <td>{{ $property->inventory_item_no }}</td>
                                            <td>{{ $property->description }}</td>
                                            <td>{{ $property->unit_measure }}</td>
                                            <td>{{ $property->quantity }}</td>
                                            <td>{{ number_format($property->unit_value, 2) }}</td>
                                            <td>{{ number_format($property->total_cost, 2) }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">No semi-expendable properties found.</td>
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
@endsection
