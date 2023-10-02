<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>

    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>

    <main class="main">
    <h1 class="title">Login to your account</h1>


    {{-- Show errors that might come up --}}
    @if ($errors->any())
    
        <ul class="error-list">
            @foreach ($errors->all() as $error)
                    <li class="error">{{$error}}</li>
            @endforeach
        </ul>


    @endif

    <form class="form" action={{route('handle_login')}} method="POST">
        @csrf
        @method('post')
        
        <div class="input-container">
            <label for="email">Email:</label>
            <input name="email" type="email" id="email" placeholder="Enter your email...">
        </div>
        <div class="input-container">
            <label for="password">Password:</label>
            <input name="password" type="password" id="password" placeholder="Enter your password...">
        </div>

        <div>
            <input title="login" class="login-btn" type="submit" value="Login">
        </div>

        <p class="no-account">Don't have an account yet? <a href={{route('register')}}>Register</a></p>
    </form>
</main>
</body>
</html>