@extends('layouts.guest')

@section('content')
<h1>{{ $project->title }}</h1>
<div>{{ $project->description }}</div>
<a href="/projects">Go back</a>
@endsection
