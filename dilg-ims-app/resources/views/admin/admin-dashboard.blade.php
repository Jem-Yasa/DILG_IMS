@extends('layouts.admin_layout')

@section('title', 'Dashboard')

@section('contents')
<div class="main-content">
    <section class="section">

        <!-- Quantity Summary Cards -->
        <div class="card-container">
            <div class="card issued">
                <div class="number">{{ $statusQuantities['issued'] ?? 0 }}</div>
                <div class="label">Qty<br>Issued</div>
            </div>
            <div class="card returned">
                <div class="number">{{ $statusQuantities['returned'] ?? 0 }}</div>
                <div class="label">Qty<br>Returned</div>
            </div>
            <div class="card reissued">
                <div class="number">{{ $statusQuantities['reissued'] ?? 0 }}</div>
                <div class="label">Qty<br>Re-Issued</div>
            </div>
            <div class="card cancelled">
                <div class="number">{{ $statusQuantities['cancelled'] ?? 0 }}</div>
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
</div>

<style>
.main-content {
    margin-left: 100px;
    margin-right: 100px;
    margin-top: 30px; /* height of navbar */
    padding: 20px;
    width: calc(100% - 50px); /* Adjusted to match margins */
    overflow-y: fix;
    height: calc(100vh - 100px);
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    align-items: center; /* This centers content horizontally */
}

/* Card container centered */
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* This centers the cards */
    gap: 50px;
    padding: 50px;
    background-color: #fafafa;
    border-radius: 30px;
    width: 150%; /* Optional: to stretch across */
    max-width: 1000px; /* Optional: limit total width */
}


/* Cards in 1 line */
.card-container {
    margin-left: 100px;
    margin-right: 500px;
    display: flex;
    flex-wrap: nowrap;
    gap: 50px;
    overflow-x: fix;
    padding: 50px;
    background-color: #fafafa;
    border-radius: 50px;
}

/* Individual Card */
.card {
    flex: 0 0 200px;
    height: 120px;
    border-radius: 10px;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    border: 2px solid #f0f0f0;
    transition: all 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
}

/* Card colors */
.issued     { background-color: #FFD700; }
.returned   { background-color: #32CD32; }
.reissued   { background-color: #1E90FF; }
.cancelled  { background-color: #FF3B30; }

.number {
    font-size: 36px;
    margin-bottom: 5px;
}

.label {
    font-size: 16px;
    text-align: center;
}

/* Asset layout */
.asset-dashboard {
    text-align: center;
    display: flex;
    justify-content: space-between;
    margin-top: 40px;
    gap: 30px;
    flex-wrap: wrap;
    box-sizing: border-box;
    border-bottom: none !important; /* Forcefully remove bottom border */
    box-shadow: none !important; /* Forcefully remove box shadow */
}

.column {
    flex: 1 1 400px;
    min-width: 350px;
    padding: 0 10px;
}

.properties-group {
    text-align: center;
    display: flex;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
}

.high-value, .low-value {
    width: 48%;
    display: flex;
    flex-direction: column;
    gap: 10px;
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
    width: 500px;
    height: 150px;
}

.asset-card.high-value {
    background-color: #006400;
    color: #fff;
}

.asset-card.low-value {
    background-color: #ADD8E6;
    color: #000;
}

.asset-total, .grand-total {
    background-color: #f4f4f4;
    text-align: center;
    font-weight: bold;
    padding: 5px;
    border-radius: 10px;
    margin-top: 10px;
    width: 300px; 
    margin-left: auto;
    margin-right: auto;
    border-bottom: none !important; 
    box-shadow: none !important; 
}

.semi-expandable {
    margin-left: 100px;
    margin-right: 100px;
    border-bottom: none !important; 
    box-shadow: none !important; 
}

.qty {
    font-size: 20px;
    font-weight: bold;
}

.cost {
    font-size: 14px;
}

/* Responsive */
@media (max-width: 1000px) {
    .card-container {
        flex-wrap: fix;
        justify-content: center;
    }

    .asset-dashboard {
        flex-direction: column;
    }

    .column {
        width: 100%;
    }

    .high-value, .low-value {
        width: 100%;
    }
}
</style>
@endsection
