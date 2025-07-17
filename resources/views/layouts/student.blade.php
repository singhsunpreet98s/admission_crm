<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Online Admission portal') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <link href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
  <style>
     html, body {
    height: 100%;
    margin: 0;
  }

  body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  .main-content {
    flex: 1;
  }
    .hero {
      background-image: url('https://images.unsplash.com/photo-1562774053-701939374585?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y29sbGVnZXxlbnwwfHwwfHx8MA%3D%3D');
      background-size: cover;
      background-position: center;
      color: white;
      height: 90vh;
      display: flex;
      align-items: center;
      text-shadow: 1px 1px 4px rgba(0,0,0,0.8);
    }
    .hero-text {
      background: rgba(0, 0, 0, 0.5);
      padding: 30px;
      border-radius: 10px;
    }
    .nav-link:hover {
      text-decoration: underline;
    }
     body {
      background-color: #f8f9fa;
    }
    .scroll-notice {
      background: #fff3cd;
      padding: 10px;
      border-left: 5px solid red;
      color: #d63384;
      font-weight: bold;
      overflow: hidden;
      white-space: nowrap;
    }

    .scroll-notice span {
      display: inline-block;
      padding-left: 100%;
      animation: scroll-left 15s linear infinite;
    }

    @keyframes scroll-left {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(-100%);
      }
    }

    .section-title {
      background-color: #dc3545;
      color: white;
      padding: 10px;
      margin-bottom: 20px;
    }

    ul li {
      margin-bottom: 0.5rem;
    }
  </style>
   @yield('styles')
</head>
<body>
  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom">
    <div class="container">
      <a class="navbar-brand fw-bold text-danger" href="#">
        <i class="bi bi-mortarboard-fill me-2"></i> ADMISSION PORTAL
      </a>
      <div class="ms-auto d-flex">
        <a class="btn btn-outline-danger me-2" href="/login">
          <i class="bi bi-box-arrow-in-right me-1"></i> Login
        </a>
        <a class="btn btn-danger" href="#">
          <i class="bi bi-person-plus-fill me-1"></i> Register
        </a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="container my-4 main-content">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer id="footer" class="bg-danger text-white mt-auto py-4">
    <div class="container text-center">
      <hr class="border-light">
      <small>
        Fee payments for this site are <strong>non-refundable</strong>. Please read our 
        <a href="term-condition.php" target="_blank" class="text-white text-decoration-underline">
          <strong>Policy Statement</strong>
        </a> before continuing.
        <br>
        In case of any problems related to this website, please contact the college or call between 
        <strong>10:30 AM - 05:30 PM</strong> with your necessary information.
      </small>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  @yield('scripts')
</body>
</html>
