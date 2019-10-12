<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}">
    <style src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></style>
</head>
<body>
    <div class="container col-xs 6">
        <form action="{{ route('auth.login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            
            </div>
            <button class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>