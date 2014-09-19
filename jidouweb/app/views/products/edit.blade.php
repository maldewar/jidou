@extends('layouts.scaffold')

@section('main')

{{ Form::model($product, array('class' => 'form-horizontal', 'method' => 'PATCH', 'files' => true, 'route' => array('products.update', $product->id))) }}

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
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('products.show', 'Cancel', $product->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop
