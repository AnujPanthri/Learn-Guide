@extends('layouts.main')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/dashboard/myskills.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('main')
    <section id='main_section'>
        <div class='header_container'>
            <h2>My Skills</h2>
            <button id="add_new_skill_btn" onclick="modal.showModal()">Add New Skill</button>
        </div>
        <hr class='line'>
        <div id="skills">
            @foreach ($skills as $skill)
                <a href="{{ route('dashboard.skill',$skill->id) }}" class='skill'>{{ $skill->title }}</a>
            @endforeach

            {{-- <div>
            No skills yet
            </div> --}}
        </div>
    </section>
    <dialog id="modal">
        <i onclick="modal.close()" class="fa-solid fa-xmark close_btn"></i>
        <form class="container" method="POST" action="{{ route('dashboard.createskill') }}">
            @csrf
            <p class='title'>
                Which Skill do you wanna start learning ?
            </p>
            <div class="field">
                <input type='text' class='skill_input' name="title" placeholder="singing, dancing">
                <span class='error_msg'>
                    @error('title')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <input type='submit' class='submit_btn' value='Add'>
        </form>
    </dialog>
    {{-- if there is any error show the modal --}}
    <script>
        @if ($errors->any())
            modal.showModal();
        @endif
    </script>
@endsection
