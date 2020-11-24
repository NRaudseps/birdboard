@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-center w-full">
            <p class="text-base text-gray-400">
                <a href="/projects">My Projects</a> / {{ $project->title }}
            </p>

            <a
                href="{{ $project->path() . '/edit' }}"
                class="text-white no-underline shadow-md rounded-lg text-sm py-2 px-5"
                style="background-color: #47cdff;"
            >
                Edit Project
            </a>
        </div>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8">
                    <h2 class="text-gray-400 text-lg font-normal mb-3">Tasks</h2>

                    {{--tasks--}}
                    @foreach($project->tasks as $task)
                        <div class="bg-white rounded-lg p-5 shadow mb-3">
                            <form method="post" action="{{ $project->path() . '/tasks/' . $task->id }}">
                                @csrf
                                @method('patch')

                                <div class="flex">
                                    <input
                                        name="body"
                                        value="{{ $task->body }}"
                                        class="w-full {{ $task->completed ? 'text-gray-400' : '' }}"
                                        class="w-full {{ $task->completed ? 'text-gray-400' : '' }}"
                                    >
                                    <input
                                        name="completed"
                                        type="checkbox"
                                        onchange="this.form.submit()"
                                        {{ $task->completed ? 'checked' : '' }}
                                    >
                                </div>
                            </form>
                        </div>
                    @endforeach

                    <div class="bg-white rounded-lg p-5 shadow mb-3">
                        <form action="{{ $project->path() . '/tasks' }}" method="post">
                            @csrf

                            <input placeholder="Add a new task..." class="w-full" name="body">
                        </form>
                    </div>
                </div>

                <div>
                    <h2 class="text-gray-400 text-lg font-normal mb-3">General Notes</h2>

                    {{--general notes--}}
                    <form method="post" action="{{ $project->path() }}">
                        @csrf
                        @method('patch')

                        <textarea
                            name="notes"
                            class="bg-white rounded-lg p-5 shadow w-full mb-4"
                            style="min-height: 200px"
                            placeholder="Anything special you want to make a note of?"
                        >{{ $project->notes }}</textarea>

                        <button
                            type="submit"
                            class="text-white no-underline shadow-md rounded-lg text-sm py-2 px-5"
                            style="background-color: #47cdff;"
                        >Save
                        </button>
                    </form>

                    @if ($errors->any())
                        <div class="field mt-6">
                            @foreach($errors->all() as $error)
                                <li class="text-sm text-red-400">{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="lg:w-1/4 px-3 mt-8">
                @include('projects.card')
            </div>
        </div>
    </main>


@endsection
