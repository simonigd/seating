
@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <h3>{{ Auth::user()->name }} Events</h3>

    <div class="row">
    @foreach($events as $event)
        <div class="col-sm-6 col-md-4">
        
            <div class="event">
         
                <div class="caption">
                <h3>{{ $event->name }}</h3>
                <p>{{ $event->description }}</p>
                <p><a href="#" class="btn btn-primary" role="button">Delete</a> <a href="{{ URL::route('event.edit',array('id' => $event->id)) }}" class="btn btn-default" role="button">Edit</a></p>
            </div>
      
        </div>
    @endforeach
    </div>


</div>



@endsection;