<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Futuristic Dashboard</title>
  <link href="{{ asset('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <style>
    *{
      color: white;
    }
    body {
      background-color: #1a1a1a;
      color: #e0e0e0;
    }
    .sidebar {
      background-color: #333;
      min-height: 100vh;
    }
    .sidebar a {
      color: #e0e0e0;
    }
    .sidebar a:hover {
      background-color: #444;
    }
    .content {
      padding: 20px;
    }
    .card {
      background-color: #2a2a2a;
      border: none;
    }
    .card-header {
      background-color: #333;
      border-bottom: 1px solid #444;
    }
    .navbar {
      background-color: #333;
      border-bottom: 1px solid #444;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 sidebar p-3">
        <nav class="nav flex-column">
          <a class="nav-link active" href="#">Dashboard</a>
          <a class="nav-link" href="#">Analytics</a>
          <a class="nav-link" href="#">Reports</a>
          <a class="nav-link" href="#">Settings</a>
        </nav>
      </div>
      <div class="col-md-10 content">
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="card">
              <div class="card-header">Card 1</div>
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card">
              <div class="card-header">Card 2</div>
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-md-12 mb-4">
            <div class="card">
              <div class="card-header">Card 3</div>
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
