<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            background-color: #f6fff8;
        }

        .login-card {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
        }

        h2 {
            color: #2d6a4f;
            font-weight: 700;
        }

        label {
            font-weight: 600;
            color: #1b4332;
        }

        .form-control {
            border-radius: 10px;
            border: 1.5px solid #b6e2a1;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #74c69d;
            box-shadow: 0 0 6px #95d5b2;
        }

        .btn-primary {
            background-color: #74c69d;
            border: none;
            font-weight: 600;
            border-radius: 10px;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #52b788;
            transform: translateY(-2px);
        }

        .alert-danger {
            border-radius: 12px;
            background-color: #ffebee;
            border: 1px solid #ffb3b3;
            color: #b91c1c;
        }
    </style>
</head>
<body class="d-flex flex-column">

<div class="d-flex flex-grow-1 justify-content-center align-items-center">
    <div class="w-100" style="max-width: 400px;">
        <h2 class="text-center mb-4"><i class="bi bi-shield-lock-fill me-2"></i>Login Admin</h2>

        <form method="POST" action="/login" class="login-card">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $errors->first() }}
            </div>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
