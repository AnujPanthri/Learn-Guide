<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <main>
        <header>
            <h1>Learn Guide</h1>
            <h4>use Learn Guide to learn how to learn skills efficently</h4>
        </header>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h3 id="form_title">Login</h3>
            <div id="input_container">
                <div class="field">
                    <input type="text" name="username" value="{{ old('username') }}" placeholder="Username">
                    <span class="error_msg">
                        @error('username')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="field">

                    <input type="password" name="password" placeholder="Password">
                    <span class="error_msg">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

            </div>
            <input type="submit" id="submit_btn" value="Login">
        </form>
        <p>new to learn guide ? <a href="{{ route('signup.form') }}">Sign up now</a></p>
    </main>
</body>

</html>
