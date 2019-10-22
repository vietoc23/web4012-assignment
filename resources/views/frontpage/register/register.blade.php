<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}">
    <style src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></style>
</head>
<body>
    <hr>
    <div class="container col-xs-6">
        <form action="{{ route('front.register.store') }}" method="post">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday" class="form-control" id="birthday" value="{{ old('birthday') }}">
            </div>
            <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Password confirmation</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="{{ old('password_confirmation') }}">
            </div>
            
            <button class="btn btn-primary">Sign up</button>
        </form>
    </div>
</body>
</html>