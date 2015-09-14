@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Event</div>
                    <div class="panel-body">
                        {!! Form::open(array('route' =>'event.store', 'method' => 'post')) !!}
                        <div class="form-group ">
                            {!! Form::label('name', "Name of Event", array('class' => 'control-label')) !!}
                            <div class="controls">
                                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                            </div>
                        </div>
                         <div class="form-group ">
                             {!! Form::label('date', "Date of Event", array('class' => 'control-label')) !!}
                            <div class="controls">
                                {!! Form::text('date', null, array('class' => 'form-control input-sm','data-date-format' => 'dd-mm-yyyy','data-provide' => 'datepicker')) !!}
                                <span class="help-block">{{ $errors->first('date', ':message') }}</span>
                            </div>
                        </div>
                        <div class="form-group ">
                             {!! Form::label('description', "Description of Event", array('class' => 'control-label')) !!}
                            <div class="controls">
                                {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
                                <span class="help-block">{{ $errors->first('date', ':message') }}</span>
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Event
                                </button>
                            </div>
                        </div>
                   
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
