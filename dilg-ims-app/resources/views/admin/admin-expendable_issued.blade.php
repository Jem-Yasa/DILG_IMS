@extends('layouts.admin_layout')

@section('title', 'Reports of Semi-Expendable Issued')

@section('contents')
    <section class="section">
        <div class="card">
            <div class ="card-body"> 
                <div class="container">
                <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                <h3 class="mb-4">Reports of Semi-Expendable Issued</h3>
                <div style="display: flex; align-items: center; gap: 5px;">
                    <!-- Search Button -->
                    <label for="search">Search:</label>
                    <input type="text" id="search" style="width: 200px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px 10px; font-size: 14px;">
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
                </div>
               
            </div>
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
                            <tbody  style="color: black; background-color:rgb(196, 196, 196);">
                                <tr>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection