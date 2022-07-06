@extends('layouts.visitor.layout')

@section('content')
    <div class="container text-center">
        <div class="container border border-dark rounded p-2 m-2">
            <h5>{{ $job->title }}</h5>
            <h6>{{ $job->subtitle }}</h6>
            <div class="d-flex justify-content-center">
                <span class="d-block fs-5 fw-bold">Tags: </span>
                @foreach ($job->tags as $tag)
                    <span class="badge bg-primary mx-1 ">{{ $tag }}</span>
                @endforeach
            </div>

            @if ($job->taker != null)
                <a href="/user/{{ $job->taker->id }}"><span class="badge bg-danger m-2 p-2 ">Job taken by
                        {{ $job->taker->name }}</span></a>
            @else
                <span class="badge bg-success m-2 p-2 ">Job avaiable </span>
            @endif
            <a href="/user/{{ $job->requester->id }}"><span class="d-block">Requester: {{ $job->requester->name }}</span></a>
            <p>
                {{ $job->description }}
            </p>
            <span>requirment</span>
            <span class="d-block fs-5 fw-bold">Tags: </span>
            @foreach ($job->requirments as $requirment)
                <span class="badge bg-success mx-1 ">{{ $requirment }}</span>
            @endforeach
            <p>{{ $job->length }}</p>
            <hr />
            <div class="container mt-5">
                <div class="d-flex justify-content-center row">
                    <div class="col-md-8">
                        <div class=p-2">
                            <form action="post">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Comments</label>
                                </div>
                                <div class="mt-2 text-right">
                                    <button class="btn btn-primary btn-sm shadow-none" type="button">
                                        Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none"
                                        type="button">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                        @if ($comments != '')
                            @foreach ($comments as $comment)
                                <div class="d-flex flex-column comment-section">
                                    <div class="bg-white p-2">
                                        <div class="flex-row user-info">
                                            <div class="d-flex flex-column justify-content-start ml-2">
                                                <span
                                                    class="d-block font-weight-bold name">{{ $comment->user->name }}</span><span
                                                    class="date text-black-50">{{ $comment->created_at }}</span>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <p class="comment-text">
                                                {{ $comment->body }}
                                            </p>
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
