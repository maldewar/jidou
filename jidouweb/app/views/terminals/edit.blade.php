@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Terminal</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($terminal, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('terminals.update', $terminal->id))) }}

        <div class="form-group">
            {{ Form::label('name', 'Name:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder'=>'Name')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('latitude', 'Latitude:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('latitude', Input::old('latitude'), array('class'=>'form-control', 'placeholder'=>'Latitude')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('longitude', 'Longitude:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('longitude', Input::old('longitude'), array('class'=>'form-control', 'placeholder'=>'Longitude')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('company_id', 'Company_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('company_id', Input::old('company_id'), array('class'=>'form-control', 'placeholder'=>'Company_id')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('type', 'Type:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('type', Input::old('type'), array('class'=>'form-control', 'placeholder'=>'Type')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('terminals.show', 'Cancel', $terminal->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop