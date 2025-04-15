@extends('layouts.admin_layout')

@section('title', 'Dashboard')

@section('contents')
<section class="section">
    <p>Dashboard ni</p>

    <!-- Quantity Summary Cards -->
    <div class="card-container">
        <div class="card issued">
            <div class="number">3</div>
            <div class="label">Qty<br>Issued</div>
        </div>
        <div class="card returned">
            <div class="number">11</div>
            <div class="label">Qty<br>Returned</div>
        </div>
        <div class="card reissued">
            <div class="number">15</div>
            <div class="label">Qty<br>Re-Issued</div>
        </div>
        <div class="card cancelled">
            <div class="number">3</div>
            <div class="label">Qty<br>Cancelled</div>
        </div>
    </div>

    <!-- Asset Summary Cards -->
    <div class="asset-dashboard">
        <!-- Semi-Expendable Properties Section -->
        <div class="column semi-expandable">
            <h3>SEMI-EXPENDABLE PROPERTIES</h3>
            <div class="properties-group">
                <div class="high-value">
                    <h4>HIGH VALUE</h4>
                    <div class="assets">
                        @foreach (['ICT EQUIPMENT', 'OFFICE EQUIPMENT', 'FURNITURE & FIXTURE', 'COMMUNICATION', 'BOOKS'] as $item)
                            <div class="asset-card high-value">
                                <div>{{ $item }}</div>
                                <div class="qty">5</div>
                                <div class="cost">60,000</div>
                            </div>
                        @endforeach
                    </div>
                    <!-- High Value Total Cost -->
                    <div class="asset-total">
                        300,000<br><small>Total Cost (High Value)</small>
                    </div>
                </div>

                <div class="low-value">
                    <h4>LOW VALUE</h4>
                    <div class="assets">
                        @foreach (['ICT EQUIPMENT', 'OFFICE EQUIPMENT', 'FURNITURE & FIXTURE', 'COMMUNICATION', 'BOOKS'] as $item)
                            <div class="asset-card low-value">
                                <div>{{ $item }}</div>
                                <div class="qty">5</div>
                                <div class="cost">60,000</div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Low Value Total Cost -->
                    <div class="asset-total">
                        300,000<br><small>Total Cost (Low Value)</small>
                    </div>
                </div>
            </div>
            <div class="grand-total">600,000<br><small>Grand Total</small></div>
        </div>

        <!-- Property, Plant & Equipment (PPE) Section -->
        <div class="column ppe">
            <h3>PROPERTY, PLANT & EQUIPMENT (PPE)</h3>
            <div class="ppe-properties">
                @foreach ([ 
                    'ICT EQUIPMENT', 'COMMUNICATION', 'BUILDING', 'OFFICE EQUIPMENT',
                    'OTHER MACHINERY', 'MOTOR VEHICLE', 'FURNITURE & FIXTURE',
                    'DISASTER RESPONSE & RESCUE', 'COMPUTER SOFTWARE'
                ] as $item)
                    <div class="asset-card ppe-item">
                        <div>{{ $item }}</div>
                        <div class="qty">5</div>
                        <div class="cost">60,000</div>
                    </div>
                @endforeach
            </div>
            <div class="grand-total">540,000<br><small>Grand Total</small></div>
        </div>

    </div>
</section>
    
@endsection