@extends('layouts.admin_layout')

@section('title', 'Property Acknowledgment Receipt')

@section('contents')
    <section class="section">
        <div class="card">
            <div class ="card-body"> 
                <div class="container">
                    <h3 class="mb-4">Property Acknowledgment Receipt</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered text-white" style="background-color: #002f6c;">
                            <thead>
                                <tr>
                                    <th>Quality</th>
                                    <th>Unit</th>
                                    <th>Unit Cost</th>
                                    <th>Total Cost</th>
                                    <th>Description</th>
                                    <th>Item No.</th>
                                    <th>Estimated Useful Life</th>
                                </tr>
                                </thead>
                                  <tbody style="color: black; background-color:rgb(196, 196, 196);">
                                        <tr>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection