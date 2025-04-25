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
                        <input type="text" id="search" onkeyup="searchTable()" style="width: 200px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px 10px; font-size: 14px;" placeholder="Search">
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="historyTable" class="table table-bordered text-white" style="background-color: #002C76;">
                        <thead>
                            <tr>
                                <th>Date and Time</th>
                                <th>ICS/RRSP No</th>
                                <th>Accountable Type</th>
                                <th>Article</th>
                                <th>Description</th>
                                <th>Reason</th>
                            </tr>
                        </thead>
                        <tbody style="color: black; background-color: rgb(196, 196, 196);">   
                        @if(count($histories) > 0)
                            @foreach($histories as $history)
                                <tr>
                                    <td>{{ $history->created_at }}</td>
                                    <td>{{ $history->ics_rrsp_no }}</td>
                                    <td>{{ $history->accountable_type }}</td>
                                    <td>{{ $history->article }}</td>
                                    <td>{{ $history->description }}</td>
                                    <td>{{ $history->reason }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No properties found.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Function to filter the table rows based on search input
    function searchTable() {
        let searchInput = document.getElementById('search').value.toLowerCase();
        let rows = document.querySelectorAll('#historyTable tbody tr');
        
        rows.forEach(row => {
            let text = row.innerText.toLowerCase(); // Get the text content of the row
            if (text.includes(searchInput)) {
                row.style.display = ''; // Show row if it matches the search input
            } else {
                row.style.display = 'none'; // Hide row if it does not match the search input
            }
        });
    }
</script>
@endsection
