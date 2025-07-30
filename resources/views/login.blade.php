<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Login</h2>
        
        <form method="POST" action="/login" class="w-50 mx-auto bg-white p-4 rounded shadow">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-warning w-100">Login</button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger mt-3 w-50 mx-auto">
                {{ $errors->first() }}
            </div>
        @endif
    </div>

</body>
</html>
