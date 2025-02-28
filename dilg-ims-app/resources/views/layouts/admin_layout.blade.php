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
        <!-- <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
          <div class="ps-lg-1">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
              <a href="https://www.bootstrapdash.com/product/spica-admin/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href="https://www.bootstrapdash.com/product/spica-admin/"><i class="mdi mdi-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white mr-0"></i>
            </button>
          </div>
        </div> -->
      </div>
    </div>

    <!-- partial:./partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <!-- <li class="nav-item sidebar-category">
          <p>Navigation</p>
          <span></span>
        </li> -->

              <!-- Logo -->
              <li class="nav-item" style="text-align: center; margin-bottom: -10px;">
                  <a class="nav-link" href="index.html">
                      <img src="{{ asset('assets/img/dilg_logo.png') }}" alt="DILG Logo" class="sidebar-logo" style="width: 150px; height: auto; margin-bottom: -10px;">
                  </a>
              </li>

              <!-- REGION VI -->
              <li class="nav-item sidebar-category" style="text-align: center; margin-top: 5px;">
                  <p class="region-text" style="font-size: 30px; color: white; font-weight: bold; margin-top: 0;">REGION VI</p>
              </li>

              <hr class="menu-divider"> <!-- Divider Line -->

        <!-- dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-dashboard') }}">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>

        <!-- issued -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-issued_table') }}">
            <i class="mdi mdi-receipt-text menu-icon"></i>
            <span class="menu-title">Property Issued <br>Table</span>
          </a>
        </li>
  
        <!-- Property Card -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-registry') }}">
          <i class="mdi mdi-receipt-text menu-icon"></i>
            <span class="menu-title">Registry of <br>Semi-Expendable <br>Property Issued</span>
          </a>
        </li>
        
        <!-- semi-Card -->
        <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin-semi_card') }}">
                  <i class="mdi mdi-receipt-text menu-icon"></i>
                    <span class="menu-title">Semi-Expendable <br>Property-Card</span>
                  </a>
                </li>

        <!-- Ledger Card -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-property_ledger_card') }}">
          <i class="mdi mdi-receipt-text menu-icon"></i>
            <span class="menu-title">Semi-Expendable <br>Property Ledger Card</span>
          </a>
        </li>

        <!-- ICS -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-ics') }}">
          <i class="mdi mdi-receipt-text menu-icon"></i>
            <span class="menu-title">Inventory Custodian Slip</span>
          </a>
        </li>

        <!-- Report of Semi-Expndable Issued -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-expendable_issued') }}">
          <i class="mdi mdi-receipt-text menu-icon"></i>
            <span class="menu-title">Report of <br>Semi-Expendable Issued</span>
          </a>
        </li>

        <!-- Property Acknowledgment Receipt -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-par') }}">
          <i class="mdi mdi-receipt menu-icon"></i>
            <span class="menu-title">Property <br>Acknowledgment Receipt</span>
          </a>
        </li>

        <!-- History -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin-history') }}">
          <i class="mdi mdi-receipt-text menu-icon"></i>
            <span class="menu-title">History</span>
          </a>
        </li>

      </ul>
    </nav>

    <!-- Navbar -->
    <div class="container-fluid page-body-wrapper">

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
              <h4 class="mb-0 font-weight-bold d-none d-xl-block">Feb 12, 2025</h4>
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

            <!-- <li class="nav-item dropdown me-1">
              <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">
                <i class="mdi mdi-calendar mx-0"></i>
                <span class="count bg-info">2</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                      <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                    </h6>
                    <p class="font-weight-light small-text text-muted mb-0">
                      The meeting is cancelled
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                      <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                    </h6>
                    <p class="font-weight-light small-text text-muted mb-0">
                      New product launch
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                      <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                    </h6>
                    <p class="font-weight-light small-text text-muted mb-0">
                      Upcoming board meeting
                    </p>
                  </div>
                </a>
              </div>
            </li> -->
            <!-- <li class="nav-item dropdown me-2">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                <i class="mdi mdi-email-open mx-0"></i>
                <span class="count bg-danger">1</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-information mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Application Error</h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                      Just now
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-settings mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                      Private message
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-account-box mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">New user registration</h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                      2 days ago
                    </p>
                  </div>
                </a>
              </div>
            </li> -->
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
        <!-- <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Here..." aria-label="search" aria-describedby="search">
              </div>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                <img src="images/faces/face5.jpg" alt="profile"/>
                <span class="nav-profile-name">Eleanor Richardson</span>
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
            <li class="nav-item">
              <a href="#" class="nav-link icon-link">
                <i class="mdi mdi-plus-circle-outline"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link icon-link">
                <i class="mdi mdi-web"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link icon-link">
                <i class="mdi mdi-clock-outline"></i>
              </a>
            </li>
          </ul>
        </div> -->
      </nav>

      <!-- Content -->
       @yield('contents')
      
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
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
</body>

</html>
