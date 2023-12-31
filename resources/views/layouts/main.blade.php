<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/layouts/main.css') }}">
    @yield('head')
</head>

<body>
    <header>
        <a class='title' href="{{ route('home') }}">LearnGuide</a>
        <div class="sub_header">
            <div>
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a>My Skills</a>
                <a href="{{ route('dashboard.explore') }}">Explore</a>
            </div>

            @if (!Auth::guard('customuser')->check())
                <div>
                    <a href="{{ route('login.form') }}">Login</a>
                </div>
            @else
                <div id="user_badge">
                    {{ Auth::guard('customuser')->user()->username }}
                </div>
            @endif
        </div>
        </div>
    </header>
    @yield('main')

</body>

</html>
