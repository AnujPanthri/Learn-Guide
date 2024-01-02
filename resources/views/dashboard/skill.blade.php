@extends('layouts.main')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/dashboard/skill.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('main')
    <section id='main_section'>
        <div class='header_container'>
            <h2>Learning {{ $skill->title }} Skill</h2>
        </div>
        <div class="task_container">
            <div class='header_container'>
                <h2>Basic/Core Skills</h2>
                <button class="new_btn" onclick="modal.showModal()">New</button>
            </div>
            <div class="tasks">
                <div class='task'>
                    <span>learn how fret works</span>
                </div>
                <div class='task'>
                    <span>learn how tuning keys works</span>
                </div>
                <div class='task'>
                    <span>learn guitar string names</span>
                </div>

            </div>
        </div>
    </section>
    <dialog id="modal">
        <i onclick="modal.close()" class="fa-solid fa-xmark close_btn"></i>
        {{-- <form class="container" method="POST" action="{{ route('dashboard.createtask',$skill->id) }}"> --}}
        <form class="container" method="POST">
            @csrf
            <p class='title'>
                New Task
            </p>
            <div class="field">
                <input type='text' class='task_input' name="title" placeholder="task name">
                <span class='error_msg'>
                    @error('title')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="field">
                <label for="task_type">Choose your task type:</label>
                <select name="task_type" class='task_input' id="task_type">
                    <option value="basic">Basic</option>
                    <option value="sub">Sub</option>
                    <option value="app">Application</option>
                </select>
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
