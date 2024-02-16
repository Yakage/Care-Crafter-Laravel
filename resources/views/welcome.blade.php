<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CareCrafter | Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="container-fluid px-5 py-3 d-flex align-items-center justify-content-between bg-dark">
    <a href="/" class="navbar-brand d-flex align-items-center text-white text-decoration-none">
      <img src="logo.png" alt="CareCrafter Logo" height="50" class="me-2">
      <span class="fs-4 fw-bold">CareCrafter</span>
    </a>
    <div class="d-flex gap-3">
      <button type="button" class="btn btn-outline-light px-3"><a href="{{ route('login') }}">Login</button></a>
      <button type="button" class="btn btn-outline-light px-3"><a href="{{ route('register') }}">Register</button></a>
    </div>
  </header>
  
  </section>
  <footer class="container-fluid py-3 text-center">
    <p>&copy; 2024 CareCrafter. All rights reserved.</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe1zYEkQAWT8Cu4y5g4OP8mUxlZ8E9j4z3JB6bN2EnL02MDqP9d6b" crossorigin="anonymous"></script>
</body>
</html>