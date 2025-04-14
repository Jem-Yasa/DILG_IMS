@extends('layouts.admin_layout')

@section('title', 'Semi-Expandable Property Ledger Card')

@section('contents')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                        <h3 class="mb-4">Semi-Expandable Property Ledger Card</h3>
                        
                        <!-- Search and Filter -->
                        <div style="display: flex; align-items: center; gap: 5px;">
                            <form method="GET" action="{{ route('property.ledger') }}">
                                <label for="search">Search:</label>
                                <input type="text" name="search" id="search" value="{{ request('search') }}" 
                                       style="width: 200px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px 10px; font-size: 14px;">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                            
                            <a class="btn" style="width: 130px; height: 36px; display: flex; align-items: center; justify-content: center; 
                                    font-weight: bold; border-radius: 5px; background-color: rgb(30, 194, 38); color: white; border: none; gap: 8px; text-decoration: none;">
                                Filter
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date Acquired</th>
                                    <th>Office</th>
                                    <th>ICS/RRSP No</th>
                                    <th>Accountable Type</th>
                                    <th>Article</th>
                                    <th>Description</th>
                                    <th>Unit Measure</th>
                                    <th>Unit Value</th>
                                    <th>Total Cost</th>
                                    <th>Inventory Item No</th>
                                    <th>Estimated Useful Life</th>
                                    <th>Issued Qty</th>
                                    <th>Issued Officer</th>
                                    <th>Returned Qty</th>
                                    <th>Returned Officer</th>
                                    <th>Re-Issued Qty</th>
                                    <th>Re-Issued Officer</th>
                                    <th>Disposal Qty</th>
                                    <th>Balance Qty</th>
                                    <th>Remarks</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="propertyTableBody" style="color: black; background-color: rgb(196, 196, 196);">
                                @foreach ($properties as $property)
                                    <tr>
                                        <td>{{ $property->date_acquired }}</td>
                                        <td>{{ $property->office }}</td>
                                        <td>{{ $property->ics_rrsp_no }}</td>
                                        <td>{{ $property->accountable_type }}</td>
                                        <td>{{ $property->article }}</td>
                                        <td>{{ $property->description }}</td>
                                        <td>{{ $property->unit_measure }}</td>
                                        <td>{{ number_format($property->unit_value, 2) }}</td>
                                        <td>{{ number_format($property->total_cost, 2) }}</td>
                                        <td>{{ $property->inventory_item_no }}</td>
                                        <td>{{ $property->estimated_useful_life }}</td>

                                        <!-- Issued Column -->
                                        <td>{{ $property->issued_qty ?? '-' }}</td>
                                        <td>{{ $property->issued_officer ?? '-' }}</td>

                                        <!-- Returned Column -->
                                        <td>{{ $property->returned_qty ?? '-' }}</td>
                                        <td>{{ $property->returned_officer ?? '-' }}</td>

                                        <!-- Re-Issued Column -->
                                        <td>{{ $property->reissued_qty ?? '-' }}</td>
                                        <td>{{ $property->reissued_officer ?? '-' }}</td>

                                        <td>{{ $property->disposal_qty ?? '-' }}</td>
                                        <td>{{ $property->balance_qty ?? '-' }}</td>
                                        <td>{{ $property->remarks }}</td>
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

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $properties->links() }}
                        </div>

                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $properties->links() }}
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
