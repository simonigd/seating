@extends('layouts.app')
@section('styles')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')

<h3>{{ Auth::user()->name }} Plan</h3>

<div class="row" id="plan">
  <div class="col-md-3">
      <div id="tools">
        <ul>
            <l1 v-repeat="table in tables"><a v-on="click: clickToolHandler(table)">Table</a></li>
        </ul>
      </div>
      <div id="guests">
      <div v-repeat="guests" v-component="guest"></div>
    </div>
       
  </div>

  <div class="col-md-9">
      

       <div id="room">

      @{{name}} | @{{noTables}} | @{{noSeats}}
      <div v-repeat="tables" v-component="table"></div>

   
   </div>

</div>


@endsection
@section('scripts')
<script src="{{ asset('js/bundle.js') }}"></script>
@endsection