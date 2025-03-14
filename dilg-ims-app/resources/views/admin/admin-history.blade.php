@extends('layouts.admin_layout')

@section('title', 'History')

@section('contents')
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                    <h3 class="mb-4">History</h3>
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <label for="search">Search:</label>
                        <input type="text" id="search" style="width: 200px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px 10px; font-size: 14px;">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-white" style="background-color: #002C76;">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>ICS/RRSP No</th>
                                <th>Accountable Type</th>
                                <th>Article</th>
                                <th>Description</th>
                                <th>Reason</th>
                                <th>Others</th>
                            </tr>
                        </thead>
                        <tbody style="color: black; background-color: rgb(196, 196, 196);">
                            @if ($canceledProperties->count() > 0)
                                @foreach ($canceledProperties as $property)
                                    <tr>
                                        <td>{{ $property->date_acquired }}</td>
                                        <td>{{ $property->ics_rrsp_no }}</td>
                                        <td>{{ $property->accountable_type }}</td>
                                        <td>{{ $property->article }}</td>
                                        <td>{{ $property->description }}</td>
                                        <td>{{ $property->reason }}</td>
                                        <td>{{ $property->other_reason }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">No canceled properties found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
