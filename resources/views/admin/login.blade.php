{{-- resources/views/admin/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg,#667eea,#764ba2);
      min-height: 100vh;
    }
    .card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 8px 24px rgba(0,0,0,0.2);
    }
    .card-title {
      font-weight: bold;
      color: #333;
    }
    .btn-primary {
      background: #667eea;
      border: none;
    }
    .btn-primary:hover {
      background: #5a67ee;
    }
    .form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.25);
    }
  </style>
</head>
<body>
  <div class="d-flex align-items-center justify-content-center vh-100">
    <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%;">
      <div class="text-center mb-3">
        <h2 class="card-title">Admin Login</h2>
        <p class="text-muted">Access your dashboard securely</p>
      </div>
      <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" name="remember" class="form-check-input" id="remember">
          <label for="remember" class="form-check-label">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
      </form>
      <p class="text-center text-muted mt-3 mb-0">&copy; {{ date('Y') }} Your Company Name</p>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
