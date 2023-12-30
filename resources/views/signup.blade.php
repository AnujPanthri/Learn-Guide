<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <main>
        <header>
            <h1>Learn Guide</h1>
            <h4>use Learn Guide to learn how to learn skills efficently</h4>
        </header>
        <form method="POST" action="{{ route('signup') }}">
            @csrf
            <h3 id="form_title">Signup</h3>
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
                <div class="field">

                    <input type="password" name="confirm_password" placeholder="Confirm password">
                    <span class="error_msg">
                        @error('confirm_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <input type="submit" id="submit_btn" value="Login">
        </form>
        <p>Already have an account? <a href="{{ route('login.form') }}">Log in</a></p>
    </main>
</body>

</html>
