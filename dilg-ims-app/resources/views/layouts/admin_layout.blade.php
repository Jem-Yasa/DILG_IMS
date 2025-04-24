<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin Dashboard</title>
  @yield('styles')

  <!-- Vendor CSS Files -->
  <link href="{{ asset('template/vendors/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet">
  <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
  <link href="{{ asset('template/images/favicon.png') }}" rel="shortcut icon" />

  <style>
    body {
      margin: 0;
      display: flex;
      transition: margin-left 0.3s ease;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #002f6c;
      overflow-y: auto;
      z-index: 1000;
      transition: width 0.3s ease;
    }

    .sidebar-collapsed .sidebar {
      width: 70px;
    }

    .navbar {
      position: fixed;
      top: 0;
      left: 250px;
      width: calc(100% - 250px);
      z-index: 1001;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }

    .sidebar-collapsed .navbar {
      left: 70px;
      width: calc(100% - 70px);
    }

    .main-content {
      margin-left: 250px;
      margin-top: 100px;
      padding: 20px;
      width: calc(100% - 250px);
      box-sizing: border-box;
      min-height: calc(100vh - 60px);
      transition: all 0.3s ease;
    }

    .sidebar-collapsed .main-content {
      margin-left: 70px;
      width: calc(100% - 70px);
    }

    .region-label {
      margin-top: 20px;
      font-weight: bold;
      font-size: 30px;
      color: white !important; 
      margin: 0;
      text-align: center;
      width: 100%;
      transition: all 0.3s ease;
    }

    .region-label.hidden {
      display: none;
    }

    .sidebar-logo {
      width: 80%;
      max-width: 125px;
      height: auto;
      transition: all 0.3s ease;
      margin-top: 20px; 
      margin-bottom: 20px; 
    }

    .sidebar-collapsed .sidebar-logo {
      width: 40px;
    }

    .menu-divider {
      border: none;
      height: 2px;
      background-color: white;
      margin: 0 auto;
      width: 80%;
    }

    /* Flexbox for Navbar */
    .navbar-menu-wrapper {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      padding: 0 20px;
    }

    .navbar-nav-right {
      display: flex;
      align-items: center;
    }

    .navbar-nav-right .nav-item {
      margin-left: 15px;
    }

    .navbar-nav-right .dropdown {
      position: relative;
    }

    .navbar-nav-right .dropdown-menu {
      position: absolute;
      top: 100%;
      left: 0;
      z-index: 1000;
      margin-top: 5px;
    }

    .navbar-toggler {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .navbar-nav-right h4 {
      font-weight: bold;
      margin-bottom: 0;
      display: inline-block;
    }

    .profile-img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }

    #realTimeDate {
      font-weight: bold;
    }
  </style>
</head>
<body>

<div class="container-scroller d-flex">

  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item text-center">
        <div class="sidebar-logo-container">
          <img src="{{ asset('assets/img/dilg_logo.png') }}" alt="DILG Logo" class="sidebar-logo">
        </div>
      </li>

      <div class="sidebar-brand d-flex flex-column align-items-center py-3">
        <span class="region-label">REGION VI</span>
      </div>

      <hr class="menu-divider">

      <li class="nav-item"><a class="nav-link" href="{{ route('admin-dashboard') }}"><i class="mdi mdi-view-quilt menu-icon"></i> <span class="menu-title">Dashboard</span></a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin-issued_table') }}"><i class="mdi mdi-receipt-text menu-icon"></i><span class="menu-title">Property Issued Table</span></a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin-registry') }}"><i class="mdi mdi-receipt-text menu-icon"></i><span class="menu-title">Registry of Semi-Expendable Property Issued</span></a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin-semi_card') }}"><i class="mdi mdi-receipt-text menu-icon"></i><span class="menu-title">Semi-Expendable Property Card</span></a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin-property_ledger_card') }}"><i class="mdi mdi-receipt-text menu-icon"></i><span class="menu-title">Property Ledger Card</span></a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin-ics') }}"><i class="mdi mdi-receipt-text menu-icon"></i><span class="menu-title">Inventory Custodian Slip</span></a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin-expendable_issued') }}"><i class="mdi mdi-receipt-text menu-icon"></i><span class="menu-title">Report of Semi-Expendable Issued</span></a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin-par') }}"><i class="mdi mdi-receipt menu-icon"></i><span class="menu-title">Property Acknowledgment Receipt</span></a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin-history') }}"><i class="mdi mdi-receipt-text menu-icon"></i><span class="menu-title">History</span></a></li>
    </ul>
  </nav>

  <div class="main-content">
    <nav class="navbar d-flex flex-row">
      <div class="navbar-menu-wrapper">
        <button id="menuToggleBtn" class="navbar-toggler" type="button">
          <span class="mdi mdi-menu"></span>
        </button>
        <p>&nbsp;&nbsp;</p>
        <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">
          @auth
            Welcome back, {{ Auth::user()->name }}
          @else
            Welcome back, Guest
          @endauth
        </h4>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item">
            <h4 id="realTimeDate" class="mb-0 font-weight-bold d-none d-xl-block"></h4>
          </li>
          <li class="nav-item dropdown">
            <img src="{{ asset('template/images/faces/face5.jpg') }}" alt="profile" class="profile-img rounded-circle mr-2">
            <p>&nbsp;&nbsp;</p>
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              Administrator
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ route('profile') }}"><i class="mdi mdi-account mr-2 text-primary"></i>Profile</a>
              <a class="dropdown-item"><i class="mdi mdi-account-circle mr-2 text-primary"></i>Account</a>
              <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="mdi mdi-settings mr-2 text-primary"></i>Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="mdi mdi-logout mr-2 text-primary"></i>Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Content -->
    @yield('contents')
  </div>
</div>

<!-- Scripts -->
<script src="{{ asset('template/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('template/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/js/off-canvas.js') }}"></script>
<script src="{{ asset('template/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('template/js/template.js') }}"></script>
<script src="{{ asset('template/js/settings.js') }}"></script>
<script src="{{ asset('template/js/todolist.js') }}"></script>

<!-- Sidebar Toggle Script -->
<script>
  document.getElementById('menuToggleBtn').addEventListener('click', function () {
    document.body.classList.toggle('sidebar-collapsed');
    
    // Toggle visibility of the region label
    const label = document.querySelector(".region-label");
    if (label) {
      label.classList.toggle("hidden");
    }
  });

  // Real-time date
  function updateDate() {
    const today = new Date();
    const options = { year: 'numeric', month: 'short', day: '2-digit' };
    document.getElementById('realTimeDate').textContent = today.toLocaleDateString('en-US', options);
  }
  updateDate();
</script>

</body>
</html>
