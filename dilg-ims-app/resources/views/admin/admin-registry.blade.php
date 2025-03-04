@extends('layouts.admin_layout')

@section('title', 'Registry of Semi-Expendable Property Issued')

@section('contents')
    <section class="section">
        <div class="card">
            <div class ="card-body"> 
                <div class="container">
                <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                        <h3 class="mb-4">Registry of Semi-Expendable Property Issued</h3>
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
                            <!-- Property Type Filter -->
                            <div id="filterDropdown" style="display: none; position: absolute; background: white; padding: 10px; border-radius: 5px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1); width: 200px; ">
                                    
                                    <!-- Dropdown with Non-Selectable Label -->
                                    <select id="propertyDropdown" onchange="filterTable()" class="form-select" style="width: 100%; padding: 5px;">
                                        <option disabled selected>Select Property Type</option> <!-- Non-Selectable Label -->
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
                    <table class="table table-bordered text-white" style="background-color: #002f6c; text-align: center;">
                        <thead>
                            <tr>
                                <th rowspan="2">Date</th>
                                <th rowspan="2">ICS/PAR RRSP No.</th>
                                <th rowspan="2">Semi-expendable Property No.</th>
                                <th rowspan="2">Item Description</th>
                                <th rowspan="2">Estimated Useful Life</th>
                                <th colspan="2" class="text-center bg-light text-dark">Issued</th>
                                <th colspan="2" class="text-center bg-light text-dark">Returned</th>
                                <th colspan="2" class="text-center bg-light text-dark">Re-Issued</th>
                                <th rowspan="2">Disposal Qty</th>
                                <th rowspan="2">Balance Qty</th>
                                <th rowspan="2">Amount</th>
                                <th rowspan="2">Remarks</th>
                            </tr>
                            <tr>
                                <th>Qty</th>
                                <th>Office/Officer</th>
                                <th>Qty</th>
                                <th>Office/Officers</th>
                                <th>Qty</th>
                                <th>Office/Officer</th>
                            </tr>
                        </thead>
                        <tbody style="color: black; background-color: rgb(196, 196, 196);">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script>
    document.getElementById("filterButton").addEventListener("click", function() {
            var dropdown = document.getElementById("filterDropdown");
            dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
        });

        // Filter function for search input
        function filterDropdown() {
            var input, filter, ul, li, i, txtValue;
            input = document.getElementById("filterInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("propertyList");
            li = ul.getElementsByTagName("li");

            for (i = 0; i < li.length; i++) {
                txtValue = li[i].textContent || li[i].innerText;
                li[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? "" : "none";
            }
    }
    </script>
@endsection