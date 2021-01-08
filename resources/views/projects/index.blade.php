@extends('layouts.guest')

@section('content')

    <header class="buttonB">
        <div class="flex justify-between items-end w-full">
            <h2 class="text-gray-500 text-sm font-normal">My Projects</h2>
            <a href="/projects/create" class="button text-white no-underline text-sm py-2 px-5">New Project</a>
        </div>
    </header>


    <main class="flex flex-wrap -mx-3 ">
        @forelse($projects as $project)
            <div class="w-1/3 px-3 pb-6">
                <div class="bg-white p-5 rounded-lg shadow " style="height: 200px">
                    <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 pl-4 border-blue">
                        <a href="{{ $project->path() }}" class="text-black no-underline">{{ $project->title }}</a>
                    </h3>

                    <div class="text-gray-500">{{ \Illuminate\Support\Str::limit($project->description, 100) }}</div>
                </div>
            </div>
        @empty
            <div>No projects yet.</div>
        @endforelse

    </main>
@endsection
