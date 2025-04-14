@extends('layouts.admin_layout')

@section('title', 'Semi-Expandable Property Card')

@section('contents')
    <section class="section">
        <div class="card">
            <div class ="card-body"> 
                <div class="container">
                <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                <h3 class="mb-4">Semi-Expandable Property Card</h3>
                <div style="display: flex; align-items: center; gap: 5px;">
                    <label for="search">Search:</label>
                    <input type="text" id="search" style="width: 200px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px 10px; font-size: 14px;">

                     <!-- Filter Button -->
                     <a 
                                class="btn" 
                                style="width: 130px; height: 36px; display: flex; align-items: center; justify-content: center; 
                                    font-weight: bold; border-radius: 5px; background-color: rgb(30, 194, 38); color: white; border: none; gap: 8px; text-decoration: none;">
                                <svg width="20" height="20" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2.5a1 1 0 01-.293.707L11 12.914V17a1 1 0 01-.447.894l-2 1A1 1 0 017 18v-5.086L3.293 7.207A1 1 0 013 6.5V4z" clip-rule="evenodd"/>
                                </svg>
                                Filter
                            </a>
                    </div>
                </div>
                <div class="table-responsive">
                        <table class="table table-bordered text-white" style="background-color: #002C76; text-align: center;">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Date</th>
                                        <th rowspan="2">Reference</th>
                                        <th colspan="3" class="text-center" style="background-color: #D3D3D3; color: black;">Receipt</th>
                                        <th rowspan="2">Semi-Expendable Property No.</th>
                                        <th rowspan="2">Semi-Expendable Property</th>
                                        <th rowspan="2">Description</th>
                                        <th colspan="3" class="text-center" style="background-color: #D3D3D3; color: black;">Issue/Transfer/Disposal</th>
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
                                <tbody style="color: black; background-color: rgb(196, 196, 196);">
                                    @if($properties->count() > 0)    
                                        @foreach($properties as $property)
                                        <tr>
                                                <td>{{ $property->date_acquired }}</td>
                                                <td>{{ $property->ics_rrsp_no }}</td>

                                                <!-- Receipt -->
                                                <td>{{ $property->quantity }}</td>
                                                <td>{{ number_format($property->unit_value, 2) }}</td>
                                                <td>{{ number_format($property->total_cost, 2) }}</td>

                                                <td>{{ $property->semi_expendable_property }}</td>
                                                <td>{{ $property->accountable_type }}</td>
                                                <td>{{ $property->description }}</td>

                                                <!-- Issue/Transfer/Disposal  -->
                                                <td>{{ $property->status == 'Issued' ? $property->quantity : '' }}</td>
                                                <td>{{ $property->status == 'Issued' ? $property->accountable_officer : '' }}</td>
                                                <td>{{ $property->status == 'Issued' ? $property->accountable_officer : '' }}</td>

                                                <td>{{ $property->balance_qty }}</td>
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
    
@endsection