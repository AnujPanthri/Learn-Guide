@extends('layouts.main')
@section('head')
<title>Dashboard</title>
<link rel="stylesheet" href="{{ asset('css/dashboard/home.css') }}">
@endsection
@section('main')
    <section id="new_user_section">
        <div class='sub_container'>
            <p>
                Start learning the skills which you always wanted to the right way.
            </p>
            <a href="{{ route('dashboard.myskills') }}" id="get_started_btn">Get Started</a>
        </div>
        <img src="{{ asset('images/skills collage.png') }}">
        {{-- @include('components.topdown')
        @include('components.bottomup') --}}
    </section>
@endsection
