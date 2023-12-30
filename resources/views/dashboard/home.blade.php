<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learn Guide | Home Page</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/home.css') }}">
</head>

<body>
    <header>
        <a class='title' href="{{ route('home') }}">LearnGuide</a>
        <div class="sub_header">
            <div>
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a>My Skills</a>
                <a>Explore</a>
            </div>
            <div class='circle'>
                {{ Auth::guard('customuser')->user()->username }}
            </div>
        </div>
    </header>
    <section>
        <p>
            you should start learning the skills which interests you or which can help you with your career.
        </p>
        <button id="get_started_btn">Get Started</button>
        @include('components.topdown')
        @include('components.bottomup')
    </section>
</body>

</html>
