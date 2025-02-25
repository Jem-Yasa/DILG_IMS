@extends('layouts.admin_layout')

@section('title', 'Property Issued Table')

@section('contents')
    <section class="section">
        <div class="card">
            <div class="card-body"> 
                <div class="container">
                    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                        <h3 class="mb-4">Property Issued Table</h3>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <label for="search">Search:</label>
                            <input type="text" id="search" style="width: 200px; height: 36px; border: 1px solid #ccc; border-radius: 5px; padding: 5px 10px; font-size: 14px;">
                            
                           <!-- Create Button -->
                            <a href="{{ route('admin-create') }}" 
                                class="btn" 
                                style="width: 130px; height: 36px; display: flex; align-items: center; justify-content: center; 
                                    font-weight: bold; border-radius: 5px; background-color: #FFDE15; color: black; border: none;">
                                + Create
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered text-white" style="background-color: #002C76; text-align: center;">
                            <thead>
                                <tr>
                                    <th rowspan="2">Date</th>
                                    <th rowspan="2">ICS/IRSP No.</th>
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
                            <tbody style="color: black; background-color:rgb(196, 196, 196);">
                                @if($properties->count() > 0)    
                                @foreach($properties as $property)
                                    <tr>
                                        <td>{{ $property->date_acquired }}</td>
                                        <td>{{ $property->ics_rrsp_no }}</td>
                                        <td>{{ $property->semi_expendable_no }}</td>
                                        <td>{{ $property->semi_expendable_name }}</td>
                                        <td>{{ $property->reference }}</td>
                                        <td>{{ $property->item_description }}</td>
                                        <td>{{ $property->estimated_useful_life }}</td>
                                        <td>{{ $property->quantity }}</td>
                                        <td>{{ $property->office_officer }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $property->amount }}</td>
                                        <td>{{ $property->remarks }}</td>
                                        <td>
                                            <a href="{{ route('property.edit', $property->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('property.destroy', $property->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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

                    <!-- Pagination Links -->
                    <div class="mt-3">
                        {{ $properties->links() }}
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection