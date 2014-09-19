@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Stock</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'stocks.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('terminal_id', 'Terminal_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'terminal_id', Input::old('terminal_id'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('product_id', 'Product_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'product_id', Input::old('product_id'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('price_override', 'Price_override:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::checkbox('price_override') }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('price', 'Price:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('price', Input::old('price'), array('class'=>'form-control', 'placeholder'=>'Price')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('order', 'Order:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'order', Input::old('order'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('promo_type', 'Promo_type:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('promo_type', Input::old('promo_type'), array('class'=>'form-control', 'placeholder'=>'Promo_type')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('promo_id', 'Promo_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'promo_id', Input::old('promo_id'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('related_stock', 'Related_stock:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('related_stock', Input::old('related_stock'), array('class'=>'form-control', 'placeholder'=>'Related_stock')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('ad_id', 'Ad_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'ad_id', Input::old('ad_id'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('quantity', 'Quantity:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'quantity', Input::old('quantity'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('hw_id', 'Hw_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'hw_id', Input::old('hw_id'), array('class'=>'form-control')) }}
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


