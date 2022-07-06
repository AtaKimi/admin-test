@extends('layouts.visitor.layout')


@section('content')
    <div class="container">
        <h1 class="text-center">Job list</h1>
        <hr />
        <div class="d-flex align-items-start flex-wrap flex-row mb-3">
            @foreach ($jobs as $job)
                <div class="border border-dark rounded p-2 overflow-auto m-2" style="height: 400px; width: 350px;">
                    <a href="/job/{{ $job->id }}">
                        <h5>{{ $job->title }}</h5>
                    </a>
                    <h6>{{ $job->subtitle }}</h6>
                    <p>{{ $job->tags }}</p>
                    <p>user</p>
                    <p>{{ $job->description }}</p>
                    <span>{{ $job->requirments }}</span>
                    <p>{{ $job->length }}</p>
                </div>
            @endforeach
            <h1>Create Post</h1>
        </div>
    </div>
@endsection
