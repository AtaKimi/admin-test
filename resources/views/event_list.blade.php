@extends('layouts.visitor.layout')


@section('content')
    <div class="container">
        <h1 class="text-center">Event list</h1>
        <hr />
        <div class="d-flex align-items-start flex-wrap flex-row mb-3">
            @foreach ($events as $event)
                <div class="border border-dark rounded p-2 overflow-auto m-2" style="height: 400px; width: 350px;">
                    <h5>{{$event->title}}</h5>
                    <h6>{{$event->start_date}} - {{$event->end_date}}</h6>
                    <p>{{$event->description}}</p>
                    <h5>Member:

                    </h5>
                    <p>
                        @foreach ($event->users as $user)
                            {{ $user->name }},
                        @endforeach
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
