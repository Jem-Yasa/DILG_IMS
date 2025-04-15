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


<style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 20px;
    }

    .card {
        flex: 1 1 200px;
        height: 100px;
        border-radius: 10px;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .issued { background-color: #FFD700; color: #fff; }
    .returned { background-color: #32CD32; }
    .reissued { background-color: #1E90FF; }
    .cancelled { background-color: #FF3B30; }

    .number {
        font-size: 36px;
        margin-bottom: 5px;
    }

    .label {
        font-size: 16px;
        text-align: center;
    }

    .asset-dashboard {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
        gap: 30px;
    }

    .column {
        flex: 1;
        min-width: 400px;
    }

    .semi-expandable, .ppe {
        flex: 1;
    }

    .column h3 {
        text-align: center;
        margin-bottom: 10px;
    }

    .properties-group {
        display: flex;
        justify-content: space-between;
        gap: 30px;
    }

    .high-value, .low-value {
        width: 48%;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .high-value h4, .low-value h4 {
        text-align: center;
    }

    .assets {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    .asset-card {
        padding: 10px;
        margin: 5px 0;
        border-radius: 10px;
        text-align: center;
        width: 169px; /* Adjusted width */
        height: 92px; /* Adjusted height */
    }

    /* High Value */
    .asset-card.high-value {
        background-color: #006400; /* Dark Green */
        color: #fff;
    }

    /* Low Value */
    .asset-card.low-value {
        background-color: #ADD8E6; /* Light Blue */
        color: #000;
    }

    /* PPE Item */
    .asset-card.ppe-item {
        background-color: #e0ebf5; /* Light Gray-Blue */
        color: #000;
    }

    .qty {
        font-size: 20px;
        font-weight: bold;
    }

    .cost {
        font-size: 14px;
    }

    .asset-total, .grand-total {
        background-color: #d9d9d9;
        text-align: center;
        font-weight: bold;
        padding: 10px;
        border-radius: 10px;
        margin-top: 10px;
    }

    .asset-total {
        background-color: #f2f2f2;
        color: black;
    }

    .ppe-properties {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
</style>

@endsection
