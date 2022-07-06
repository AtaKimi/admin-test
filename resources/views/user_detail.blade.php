@extends('layouts.visitor.layout')

@section('content')
<div class="container">
    <div class="card w-75 mx-auto">
        <div class="text-center p-5">
            <h3>Hello!</h3>
            <h1>I'm {{$user->name}}</h4>
            <h6 >{{$user->title}}</h6>
            <p>{{$user->description}}</p>
            
            <h6>Joined Events:</h6>
            <p>
                <ol>
                    @foreach ($user->events as $event)
                    <li>{{$event->title}}</li>                
                    @endforeach 
                </ol>
            </p>
            <h6>Job taken: </h6>
            <p>
                @if (!empty($user->job_taken[0]))
                    {{$user->job_taken[0]->title}}
                @endif
            </p>
            
            <hr>
            <div class="profile-icon">
                <i class="bi-calendar" style="font-size: 1.8rem; color: cornflowerblue; vertical-align: sub;"></i>
                <span class="icon-span">{{$user->birthday}}</span>
            </div>
            <div>
                <i class="bi-telephone" style="font-size: 1.8rem; color: cornflowerblue; vertical-align: sub;"></i>
                <span class="icon-span">{{$user->number}}</span>
            </div>
            <div>
                <i class="bi-mailbox" style="font-size: 1.8rem; color: cornflowerblue; vertical-align: sub;"></i>
                <span class="icon-span">{{$user->email}}</span>
            </div>
            <div>
                <i class="bi-house" style="font-size: 1.8rem; color: cornflowerblue; vertical-align: sub;"></i>
                <span class="icon-span">{{$user->location}}</span>
            </div>
        </div>
  </div>
@endsection     