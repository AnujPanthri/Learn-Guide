<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/layouts/main.css') }}">
    @yield('head')
</head>

<body>
    <header>
        <div class="left">
            <i class='fa-solid fa-bars menu_btn'></i>
            <a class='title' href="{{ route('home') }}">LearnGuide</a>
        </div>
        <div class="sub_header hidden">
            <div>
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('dashboard.myskills') }}">My Skills</a>
                {{-- <a href="{{ route('dashboard.explore') }}">Explore</a> --}}
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
    <script src="{{ asset('js/layouts/main.js') }}"></script>

</body>

</html>
