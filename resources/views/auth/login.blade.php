<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center mt-5">
    <div class="card p-4" style="width: 400px;">
        <h4 class="mb-3 text-center">Login</h4>

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password"
                       class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>

            <p class="mt-3 text-center">
                Belum punya akun? <a href="{{ route('register') }}">Register</a>
            </p>
        </form>
    </div>
</div>

</body>
</html>
