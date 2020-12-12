@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-base text-gray-400">
                <a
                    href="/projects"
                    class="text-gray-400 font-normal no-underline hover:underline"
                >My Projects</a> / {{ $project->title }}
            </p>

            <div class="flex items-center">
                @foreach($project->members as $member)
                    <img
                        src="{{ gravatar_url($member->email) }}"
                        alt="{{ $member->name }}'s avatar"
                        class="rounded-full w-8 mr-2"
                    >
                @endforeach

                <img
                    src="{{ gravatar_url($project->owner->email) }}"
                    alt="{{ $project->owner->name }}'s avatar"
                    class="rounded-full w-8 mr-2"
                >

                <a
                    href="{{ $project->path() . '/edit' }}"
                    class="text-white no-underline shadow-md rounded-lg text-sm py-2 px-5 ml-4"
                    style="background-color: #47cdff;"
                >
                    Edit Project
                </a>
            </div>
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

                    @include('errors')
                </div>
            </div>
            <div class="lg:w-1/4 px-3 mt-8">
                @include('projects.card')
                @include('projects.activity.card')

                @can ('manage', $project)
                    @include('projects.invite')
                @endcan
        </div>
    </main>


@endsection
