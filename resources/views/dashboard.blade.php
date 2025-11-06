@extends('layouts.app')

@section('title', 'Fintech Dashboard')

@section('content')
<style>
    /* ========= Global Styles ========= */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f3f5f9;
        margin: 0;
        padding: 0;
    }

    .dashboard {
        display: flex;
        min-height: 100vh;
    }

    /* ========= Sidebar ========= */
    .sidebar {
        width: 260px;
        background: #0f172a;
        color: #e2e8f0;
        display: flex;
        flex-direction: column;
        position: fixed;
        height: 100%;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        transition: 0.3s ease;
    }

    .logo {
        padding: 25px 0;
        text-align: center;
        font-size: 1.4rem;
        font-weight: 700;
        color: #38bdf8;
        letter-spacing: 1px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar ul {
        list-style: none;
        margin: 0;
        padding: 20px 0;
    }

    .sidebar ul li {
        position: relative;
    }

    .sidebar ul li a {
        display: block;
        padding: 12px 30px;
        color: #cbd5e1;
        text-decoration: none;
        font-size: 0.95rem;
        transition: 0.3s;
    }

    .sidebar ul li a:hover,
    .sidebar ul li a.active {
        background-color: rgba(56, 189, 248, 0.15);
        color: #fff;
    }

    /* Dropdown */
    .dropdown-content {
        display: none;
        background-color: #1e293b;
    }

    .dropdown-content a {
        padding-left: 45px;
        font-size: 0.9rem;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* ========= Main Content ========= */
    .main-content {
        margin-left: 260px;
        flex: 1;
        padding: 40px;
        transition: 0.3s ease;
    }

    .dashboard-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .page-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: #0f172a;
    }

    .btn-primary {
        background-color: #38bdf8;
        border: none;
        padding: 10px 18px;
        color: #fff;
        border-radius: 8px;
        cursor: pointer;
        font-size: 0.95rem;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background-color: #0ea5e9;
    }

    /* ========= Card Grid ========= */
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 20px;
    }

    .card {
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
        transition: all 0.2s ease-in-out;
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    .card h3 {
        font-size: 1rem;
        font-weight: 500;
        color: #475569;
        margin-bottom: 10px;
    }

    .card .value {
        font-size: 1.8rem;
        font-weight: 600;
        color: #0f172a;
    }

    .card small {
        color: #22c55e;
        font-size: 0.85rem;
    }

    /* ========= Charts Placeholder ========= */
    .chart {
        background: #fff;
        margin-top: 30px;
        border-radius: 12px;
        padding: 25px;
        height: 300px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
    }

    .chart h4 {
        margin-bottom: 15px;
        color: #1e293b;
    }

    /* ========= Responsive ========= */
    @media (max-width: 900px) {
        .main-content {
            margin-left: 0;
        }

        .sidebar {
            display: none;
        }
    }
</style>

<div class="dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">FinEdge</div>
        <ul>
            <li><a href="#" class="active">Dashboard</a></li>
            <li><a href="#">Transactions</a></li>
                        <li class="dropdown">
                <a href="#">Banking ▾</a>
                <div class="dropdown-content">
                    <a href="{{ route('ifsc.verify.form') }}">IFSC Verify</a>
                    <a href="{{ route('bank.verify') }}">Bank Verification</a>
                    <a href="{{ route('apyhub.bank.form') }}">APY Hub Bank Verification</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#">Accounts ▾</a>
                <div class="dropdown-content">
                    <a href="#">Savings</a>
                    <a href="#">Loans</a>
                    <a href="#">Investments</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#">Analytics ▾</a>
                <div class="dropdown-content">
                    <a href="#">Reports</a>
                    <a href="#">Revenue</a>
                    <a href="#">Expenses</a>
                </div>
            </li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </aside>

    <!-- Main -->
    <main class="main-content">
        <div class="dashboard-header">
            <h1 class="page-title">Fintech Dashboard</h1>
            <button class="btn-primary">Add Transaction</button>
        </div>

        <!-- KPI Cards -->
        <div class="card-grid">
            <div class="card">
                <h3>Total Balance</h3>
                <div class="value">$125,450</div>
                <small>+4.5% from last month</small>
            </div>
            <div class="card">
                <h3>Monthly Revenue</h3>
                <div class="value">$23,870</div>
                <small>+6.2% from last week</small>
            </div>
            <div class="card">
                <h3>Active Loans</h3>
                <div class="value">320</div>
                <small>+2% new this month</small>
            </div>
            <div class="card">
                <h3>Pending Withdrawals</h3>
                <div class="value">$5,200</div>
                <small>-1.2% from last week</small>
            </div>
        </div>

        <!-- Chart Placeholder -->
        <div class="chart">
            <h4>Revenue Overview</h4>
            <p style="color:#94a3b8;">(Chart coming soon — integrate Chart.js or ApexCharts here)</p>
        </div>
    </main>
</div>
@endsection
