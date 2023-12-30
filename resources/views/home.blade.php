<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learn Guide | Home Page</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <header>
        <a class='title'>LearnGuide</a>
        <div class="sub_header">
            <div>
                <a>Dashboard</a>
                <a>My Skills</a>
                <a>Explore</a>
            </div>
            <div>
                <a>Login</a>
            </div>
        </div>
    </header>
    <section id='info_container'>
        <p>
            Let’s learn skills the right way
            with systematic and
            right approaches for you
        </p>

        <img src="{{ asset('images/keep_learning.png') }}">
    </section>
    <section id='topdown_container'>
        <h2 class="heading">Top Down Approach</h2>
        <div class="main_section">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti vel vero quia impedit! Fuga unde recusandae eum minima. At eius, sequi dolore nostrum optio veritatis aliquid voluptate nesciunt! Libero, at?</p>
            <img src="{{ asset('images/keep_learning.png') }}">
        </div>
    </section>
    <section id='bottomup_container'>
        <h2 class="heading">Bottom Up Approach</h2>
        <div class="main_section">
            <img src="{{ asset('images/keep_learning.png') }}">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti vel vero quia impedit! Fuga unde recusandae eum minima. At eius, sequi dolore nostrum optio veritatis aliquid voluptate nesciunt! Libero, at?</p>
        </div>
    </section>

</body>

</html>
