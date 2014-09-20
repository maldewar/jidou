@extends('layouts.scaffold')

@section('main')

{{ Form::open(array('route' => 'products.store', 'class' => 'form-horizontal', 'files' => true)) }}

        <div class="form-group">
            {{ Form::label('sku', 'Sku:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('sku', Input::old('sku'), array('class'=>'form-control', 'placeholder'=>'Sku')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('title', 'Title:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('title', Input::old('title'), array('class'=>'form-control', 'placeholder'=>'Title')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('desc', 'Desc:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('desc', Input::old('desc'), array('class'=>'form-control', 'placeholder'=>'Desc')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('price', 'Price:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('price', Input::old('price'), array('class'=>'form-control', 'placeholder'=>'Price')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('slogan', 'Slogan:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('slogan', Input::old('slogan'), array('class'=>'form-control', 'placeholder'=>'Slogan')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('meta', 'Meta:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('meta', Input::old('meta'), array('class'=>'form-control', 'placeholder'=>'Meta')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('image_orientation', 'Image Orientation:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{Form::select('image_orientation', Product::$orientations , Input::old('image_orientation'), array('class'=>'form-control'))}}
            </div>
        </div>

        <div class="form-group">
          {{ Form::label('image', 'Image:', array('class'=>'col-md-2 control-label')) }}
          <div class="col-sm-10">
            <span class="btn btn-default btn-file">
              Browse <input type="file" name="image">
            </span>
          </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


