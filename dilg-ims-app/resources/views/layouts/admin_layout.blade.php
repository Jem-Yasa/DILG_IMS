<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @yield('styles')

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template/vendors/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css.map') }}" rel="stylesheet">
    <link href="{{ asset('template/css/maps/style.css.map') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

    <!-- Template Main CSS File -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
    

    <!-- Favicons -->
    <link href="{{ asset('template/images/favicon.png') }}" rel="shortcut icon" />
</head>

<body>

  <style>
    .logo-container {
      text-align: center;
      padding: 15px 0;
    }

    .sidebar-logo {
      width: 80px; /* Adjust the width as needed */
      height: auto;
      display: block;
      margin: 10px auto; /* Ensure it doesn't get too large */
    }

    .sidebar-category {
    display: flex;
    justify-content: center; 
    align-items: center; 
    text-align: center;
    padding: 20px 0;
    }

    .region-text {
    font-weight: bold;
    font-size: 50px; !important /* 150px is too large; reduce as needed */
    color: white; /* Make sure the background isn't white */
    margin: 0;
    display: block; /* Ensure it follows block-level styling */
    text-align: center;
    width: 100%;
    }

    .menu-divider {
    border: none;
    height: 2px;
    background-color: white; /* Adjust color if needed */
    margin: 0 auto; /* Centers the line */
    width: 80%; /* Adjust width */
    }
    
  </style>

  <div class="container-scroller d-flex">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">

      </div>
    </div>

    <!-- partial:./partials/_sidebar.html -->
    <style>
  body {
    margin: 0;
    display: flex;
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
  }

  .main-content {
    margin-left: 250px;
    padding: 20px;
    width: calc(100% - 250px);
  }

  .menu-title {
    font-size: 14px;
    line-height: 1.3;
  }

  .sidebar-logo {
    max-width: 100%;
    height: auto;
  }

    .navbar {
    position: fixed;
    top: 0;
    left: 250px; /* width of sidebar */
    width: calc(100% - 250px);
    z-index: 1001;
    background-color: #fff; /* or any bg color to match your theme */
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }

  .main-content {
    margin-left: 250px;
    margin-top: 95px; /* height of navbar */
    padding: 20px;
    width: calc(100% - 80px);
    overflow-y: Auto;
    height: calc(100vh - 100px); /* subtract navbar height */
  }


</style>



<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item" style="text-align: center; margin-bottom: -10px;">
      <a class="nav-link" href="index.html">
        <img src="{{ asset('assets/img/dilg_logo.png') }}" alt="DILG Logo" class="sidebar-logo" style="width: 150px; height: auto; margin-bottom: -10px;">
      </a>
    </li>

    <li class="nav-item sidebar-category" style="text-align: center; margin-top: 5px;">
      <p class="region-text" style="font-size: 30px; color: white; font-weight: bold; margin-top: 0;">REGION VI</p>
    </li>

    <hr class="menu-divider">

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin-dashboard') }}">
        <i class="mdi mdi-view-quilt menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin-issued_table') }}">
        <i class="mdi mdi-receipt-text menu-icon"></i>
        <span class="menu-title">Property Issued <br>Table</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin-registry') }}">
        <i class="mdi mdi-receipt-text menu-icon"></i>
        <span class="menu-title">Registry of <br>Semi-Expendable <br>Property Issued</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin-semi_card') }}">
        <i class="mdi mdi-receipt-text menu-icon"></i>
        <span class="menu-title">Semi-Expendable <br>Property-Card</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin-property_ledger_card') }}">
        <i class="mdi mdi-receipt-text menu-icon"></i>
        <span class="menu-title">Semi-Expendable <br>Property Ledger Card</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin-ics') }}">
        <i class="mdi mdi-receipt-text menu-icon"></i>
        <span class="menu-title">Inventory Custodian Slip</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin-expendable_issued') }}">
        <i class="mdi mdi-receipt-text menu-icon"></i>
        <span class="menu-title">Report of <br>Semi-Expendable Issued</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin-par') }}">
        <i class="mdi mdi-receipt menu-icon"></i>
        <span class="menu-title">Property <br>Acknowledgment Receipt</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin-history') }}">
        <i class="mdi mdi-receipt-text menu-icon"></i>
        <span class="menu-title">History</span>
      </a>
    </li>
  </ul>
</nav>

<!-- Your content goes here -->
<div class="main-content">

    <!-- Navbar -->
      <!-- partial:./partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <!-- <div class="navbar-brand-wrapper">
            <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
          </div> -->
          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1"> Welcome back, Brandon Haynes</h4>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item"> 
              <h4 id="realTimeDate" class="mb-0 font-weight-bold d-none d-xl-block"></h4>
            </li> 
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                  <img src="{{ asset('template/images/faces/face5.jpg') }}" alt="profile" class="profile-img"/>
                  <span class="nav-profile-name">Administrator</span>
              </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item">
                    <i class="mdi mdi-settings text-primary"></i>
                    Settings
                </a>
                <a class="dropdown-item">
                    <i class="mdi mdi-logout text-primary"></i>
                    Logout
                </a>
            </div>
          </li>
      </nav>

      <!-- Content -->
      @yield('contents')
      
      <!-- main-panel ends -->
    </div>
 </div>

  <!-- container-scroller -->

  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
   
  <!-- realtime date  -->
      <script>
      function updateDate() {
        const today = new Date();
        const options = { year: 'numeric', month: 'short', day: '2-digit' };
        document.getElementById('realTimeDate').textContent = today.toLocaleDateString('en-US', options);
      }
      
      updateDate();
    </script>
</body>

</html>
