<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Online Admission portal') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
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
  </style>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg ">
  <div class="container">
    <a class="navbar-brand" href="#">College Admission Portal</a>
    <div class="ms-auto">
      <a class="nav-link text-dark d-inline me-3" href="/login">Login</a>
      <a class="nav-link text-dark d-inline me-3" href="#">Register</a>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero">
  <div class="container text-center">
    <div class="hero-text">
      <h1 class="display-4 fw-bold">Welcome to College Admission Portal</h1>
      <p class="lead">Your gateway to a bright future. Apply now and become a part of our academic excellence.</p>
      <a href="#" class="btn btn-light btn-lg mt-3">Check Admission Status</a>
    </div>
  </div>
</section>

<!-- Features Section -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-5">Why Choose Us?</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card shadow">
          <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?fit=crop&w=800&q=80" class="card-img-top" alt="Campus">
          <div class="card-body">
            <h5 class="card-title">Beautiful Campus</h5>
            <p class="card-text">Our campus provides a peaceful learning environment with modern facilities and green surroundings.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow">
          <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?fit=crop&w=800&q=80" class="card-img-top" alt="Courses">
          <div class="card-body">
            <h5 class="card-title">Diverse Courses</h5>
            <p class="card-text">Choose from a wide range of undergraduate and postgraduate programs tailored to your goals.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow" style="height: 374px">
          <img src="https://media.istockphoto.com/id/511793899/photo/student-services-department-of-university-providing-advice.jpg?s=612x612&w=0&k=20&c=IGGMYXjxUcm9C_Ya7pVX4M5MBYYYQc1tz26vKOds_jw="  class="card-img-top" alt="Support">
          <div class="card-body">
            <h5 class="card-title">Student Support</h5>
            <p class="card-text">Get guidance every step of the way—from application to orientation and beyond.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class=" text-dark py-4 mt-5">
  <div class="container text-center">
    <p class="mb-1">XYZ College, 123 College Road, Education City</p>
    <p>Email: admissions@xyzcollege.edu | Phone: +91 98765 43210</p>
    <p class="mb-0">&copy; 2025 XYZ College. All rights reserved.</p>
  </div>
</footer>

</body>
</html>
