<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>

    <link rel="stylesheet" href="{{asset('css/register.css')}}">
</head>
<body>

    <main class="main">
    <h1 class="title">Create new account</h1>


    {{-- Show any errors that might come up --}}
    @if ($errors->any())
        <ul class="error-list">
            @foreach ($errors->all() as $error)
                <li class="error">{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form class="form" action={{route('handle_register')}} method="POST">
        @csrf
        @method("post")
        <div class="input-container">
            <label for="name">Name:</label>
            <input name="name" type="text" id="name" placeholder="Enter your name...">
        </div>
        <div class="input-container">
            <label for="email">Email:</label>
            <input name="email" type="email" id="email" placeholder="Enter your email...">
        </div>
        <div class="input-container">
            <label for="password">Password:</label>
            <input name="password" type="password" id="password" placeholder="Enter your password...">
        </div>
        <div class="input-container">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password...">
        </div>

        <div>
            <input class="register-btn" type="submit" value="Register">
        </div>

        <p class="has-account">Already have an account? <a href={{route('login')}}>Login</a></p>
    </form>

</main>
</body>
</html>