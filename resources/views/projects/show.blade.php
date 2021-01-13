@extends('layouts.guest')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-gray-500 text-sm font-normal">
                <a href="/projects" class="text-gray-500 text-sm no-underline">My Projects</a> / {{ $project->title }}
            </p>
            <a href="/projects/create" class="button">New Project</a>
        </div>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-8">
                <div class="mb-6">
                    <h2 class="text-lg text-gray-500 font-normal mb-3 font-semibold">Tasks</h2>
                    {{-- tasks  --}}

                    @foreach($project->tasks as $task)
                        <div class="card mb-3">
                            <form method="POST" action="{{ $task->path() }}">
                                @method('PATCH')
                                @csrf
                                <div class="flex">
                                    <input name="body" value="{{ $task->body }}" class="w-full {{ $task->completed ? 'text-gray-400' : ''}}">
                                    <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : ''}}>
                                </div>
                            </form>
                        </div>
                    @endforeach
                    <div class="card mb-3">
                        <form action="{{ $project->path() . '/tasks' }}" method="post">
                            @csrf
                            <input placeholder="Add a new task..." name="body" type="text" class="w-full">
                        </form>
                    </div>
                </div>

                <div>
                    <h2 class="text-lg text-gray-500 mb-3 font-semibold">General Notes</h2>
                    {{-- General Notes --}}

                    <form method="post" action="{{ $project->path() }}">
                        @csrf
                        @method('PATCH')
                        <textarea
                            name="notes"
                            class="card w-full mt-4"
                            style="min-height: 200px"
                            placeholder="Anuthing special that you want to make a note off"
                        >{{ $project->notes  }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>
                </div>
            </div>

            <div class="lg:w-1/4 px-3">
                @include('projects.card')
            </div>

        </div>
    </main>

@endsection
