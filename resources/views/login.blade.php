<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Futuristic Login</title>
  <link href="{{ asset('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <style>
    body {
      background-color: #2c3e50;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: 'Arial', sans-serif;
    }
    .login-container {
      background-color: #34495e;
      padding: 2rem;
      border-radius: 0.5rem;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-control {
      border-radius: 0.25rem;
      background-color: #3b4b61;
      border: 1px solid #3b4b61;
      color: #ecf0f1;
    }
    .form-control:focus {
      background-color: #465a75;
      border-color: #465a75;
      color: #ecf0f1;
    }
    .btn-primary {
      background-color: #1abc9c;
      border-color: #16a085;
    }
    .btn-primary:hover {
      background-color: #16a085;
      border-color: #149174;
    }
    .form-label {
      color: #ecf0f1;
    }
    h2 {
      color: #ecf0f1;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2 class="mb-4 text-center">Login</h2>
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="NIM" class="form-label">NIM</label>
        <input type="NIM" class="form-control" id="NIM" name="nim" placeholder="Enter your NIM">
      </div>
      @error('nim')
        <div class="error error-txt">{{ $message }}</div>
      @enderror
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
      </div>
      @error('password')
        <div class="error error-txt">{{ $message }}</div>
      @enderror
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>

  <script src="{{ asset('assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
