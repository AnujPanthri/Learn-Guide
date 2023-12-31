@extends('layouts.main')
@section('head')
    <title>Explore Skills</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/explore.css') }}">
@endsection
@section('main')
    <section id="main_section">
        <form id="search_skill_form">
            <input type='text' class='search_input'>
            <input type='submit' class='search_btn' value='Search'>
        </form>
        <div class="skills_container">
            <div class="create_skill_container">
                <a href='#' class="create_skill_btn">Create New Skill</a>
            </div>

            <div class="skills">
                @for ($i = 0; $i < 10; $i++)
                    <div class="skill">
                        <span class='title'>Singing Skill</span>

                        <a href="#" class="start_btn">Start</a>
                    </div>
                @endfor
            </div>

        </div>
    </section>
@endsection
