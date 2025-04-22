@extends('layouts.admin_layout')

@section('title', 'Dashboard')

@section('contents')
<section class="section">

    <!-- Quantity Summary Cards -->
    <div class="card-container">
        <div class="card issued">
            <div class="number">{{ isset($statusQuantities['issued']) ? $statusQuantities['issued'] : 0 }}</div>
            <div class="label">Qty<br>Issued</div>
        </div>
        <div class="card returned">
            <div class="number">{{ isset($statusQuantities['returned']) ? $statusQuantities['returned'] : 0 }}</div>
            <div class="label">Qty<br>Returned</div>
        </div>
        <div class="card reissued">
            <div class="number">{{ isset($statusQuantities['reissued']) ? $statusQuantities['reissued'] : 0 }}</div>
            <div class="label">Qty<br>Re-Issued</div>
        </div>
        <div class="card cancelled">
            <div class="number">{{ isset($statusQuantities['cancelled']) ? $statusQuantities['cancelled'] : 0 }}</div>
            <div class="label">Qty<br>Cancelled</div>
        </div>
    </div>

    <!-- Asset Summary Cards -->
    <div class="asset-dashboard">
        <div class="column semi-expandable">
            <h3>SEMI-EXPENDABLE PROPERTIES</h3>
            <div class="properties-group">

                <!-- High Value -->
                <div class="high-value">
                    <h4>HIGH VALUE</h4>
                    <div class="assets">
                        @if(!empty($inventorySummary['high']))
                            @foreach ($inventorySummary['high'] as $type => $cost)
                                <div class="asset-card high-value">
                                    <div>{{ $type }}</div>
                                    <div class="qty">—</div>
                                    <div class="cost">{{ number_format($cost, 2) }}</div>
                                </div>
                            @endforeach
                        @else
                            <p>No high value data</p>
                        @endif
                    </div>
                    <div class="asset-total">
                        {{ number_format($totalCost['high'] ?? 0, 2) }}<br><small>Total Cost (High Value)</small>
                    </div>
                </div>

                <!-- Low Value -->
                <div class="low-value">
                    <h4>LOW VALUE</h4>
                    <div class="assets">
                        @if(!empty($inventorySummary['low']))
                            @foreach ($inventorySummary['low'] as $type => $cost)
                                <div class="asset-card low-value">
                                    <div>{{ $type }}</div>
                                    <div class="qty">—</div>
                                    <div class="cost">{{ number_format($cost, 2) }}</div>
                                </div>
                            @endforeach
                        @else
                            <p>No low value data</p>
                        @endif
                    </div>
                    <div class="asset-total">
                        {{ number_format($totalCost['low'] ?? 0, 2) }}<br><small>Total Cost (Low Value)</small>
                    </div>
                </div>

            </div>
            <div class="grand-total">
                {{ number_format($totalCost['grand'] ?? 0, 2) }}<br><small>Grand Total</small>
            </div>
        </div>
    </div>
</section>

<style>
    .date-container {
        text-align: right;
        margin-bottom: 20px;
        font-size: 16px;
        color: #555;
    }

    .current-date {
        font-weight: bold;
        color: #333;
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 20px;
        padding: 20px;
        background-color: #fafafa;
        border-radius: 15px;
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
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        margin: 10px;
        border: 2px solid #f0f0f0;
        background-color: #ffffff;
        transition: all 0.2s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
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
        width: 169px;
        height: 92px;
    }

    .asset-card.high-value {
        background-color: #006400;
        color: #fff;
    }

    .asset-card.low-value {
        background-color: #ADD8E6;
        color: #000;
    }

    .asset-card.ppe-item {
        background-color: #e0ebf5;
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
