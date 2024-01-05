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
                <button class="new_btn" onclick="showCreateTask('basic')">New</button>
            </div>
            <div class="tasks">

                @foreach ($tasks as $task)
                    @continue($task->type != 'basic')
                    <div class='task' onclick='showTask({{ $task->id }})'>
                        <span>{{ $task->title }}</span>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="task_container">
            <div class='header_container'>
                <h2>Sub Skills</h2>
                <button class="new_btn" onclick="showCreateTask('sub')">New</button>
            </div>
            <div class="tasks">

                @foreach ($tasks as $task)
                    @continue($task->type != 'sub')
                    <div class='task' onclick='showTask({{ $task->id }})'>
                        <span>{{ $task->title }}</span>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="task_container">
            <div class='header_container'>
                <h2>Applications</h2>
                <button class="new_btn" onclick="showCreateTask('app')">New</button>
            </div>
            <div class="tasks">

                @foreach ($tasks as $task)
                    @continue($task->type != 'app')
                    <div class='task' onclick='showTask({{ $task->id }})'>
                        <span>{{ $task->title }}</span>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <dialog id="createtask_modal">
        <i onclick="closeCreateTask()" class="fa-solid fa-xmark close_btn"></i>
        <form class="container" method="POST" action="{{ route('dashboard.createtask', $skill->id) }}">
            {{-- <form class="container" method="POST"> --}}
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
                    @error('task_type')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <input type='submit' class='submit_btn' value='Add'>
        </form>
    </dialog>

    <dialog id="task_modal">
        <i onclick="task_modal.close()" class="fa-solid fa-xmark close_btn"></i>
        <form class="container" method="POST" action="{{ route('dashboard.taskpracticed') }}">
            @csrf
            <input type='text' name="task_id" id="task_id" hidden>
            <span class='title'>Title</span>
            {{-- <span>Practice Count: <span class='count'>0</span></span> --}}
            <div class="progress_bar_container">

                <div class="progress_bar"></div>

            </div>
            <input class="practice_btn" type="submit" value="practiced">
        </form>
    </dialog>

    <div id="error_container"></div>

    <script src="{{ asset('js/dashboard/skill.js') }}"></script>
    <script>
        var taskdetail_url = "{{ route('dashboard.taskdetail', 1) }}";
        taskdetail_url = taskdetail_url.split('/').slice(0, -1).join("/");
        var taskdetail_url = "{{ route('dashboard.taskdetail', 1) }}";
        taskdetail_url = taskdetail_url.split('/').slice(0, -1).join("/");

        @foreach ($errors->all() as $error)
        addError('{{ $error }}');
        @endforeach

        // task_modal.showModal();
    </script>
@endsection
