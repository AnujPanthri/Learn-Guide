@extends('layouts.main')
@section('head')
<title>Learn Guide | Home Page</title>
<link rel='stylesheet' href="{{ asset('css/home.css') }}">
@endsection
@section('main')
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
            <p>Top-down learning is a teaching style that focuses on providing students a large view of a subject, without
                explaining the components that make up the subject. It is based on the idea that a teacher drives the
                classroom and determines what is to be taught. Top-down learning also involves perceiving the world by
                drawing from what we already know in order to interpret new information. Top-down learning is influenced by
                higher mental processes such as expectations, beliefs, values, and social influences.</p>
            @include('components.topdown')
        </div>
    </section>
    <section id='bottomup_container'>
        <h2 class="heading">Bottom Up Approach</h2>
        <div class="main_section">
            @include('components.bottomup')
            <p>Bottom-up learning is a teaching style that focuses on providing students the components that make up a
                subject, and then building up to a larger view of the subject. It is based on the idea that students are
                active learners who construct their own knowledge from the bottom up. Bottom-up learning also involves
                perceiving the world by processing sensory information and building up to higher levels of cognition.
                Bottom-up learning is influenced by lower mental processes such as perception, attention, memory, and
                reasoning.</p>
        </div>
    </section>
@endsection
