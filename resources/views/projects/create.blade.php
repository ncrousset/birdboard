@extends('layouts.guest')

@section('content')
    <form
        method="post"
        action="/projects"
        class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-12 rounded shadow">
        @csrf
        <h1 class="text-2xl font-normal mb-10 text-center">
            Let's start something new
        </h1>



        <div class="field mb-6">
            <label class="label text-sm mb-2 block" for="title">Title</label>
            <div class="control">
                <input
                    type="text"
                    class="input bg-transparent border border-gray-light rounded p-2 text-xs w-full focus:outline-none"
                    name="title"
                    placeholder="My next awesome project">
            </div>
        </div>

        <div class="field mb-6">
            <label class="label text-sm mb-2 block"  for="description" >Description</label>

            <div class="control">
                <textarea
                    name="description"
                    rows="5"
                    placeholder=""
                    class="textarea bg-transparent border border-gray-light rounded p-2 text-xs w-full focus:outline-none">
                </textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create Project</button>
                <a href="/projects">Cancel</a>
            </div>
        </div>

    </form>
@endsection
