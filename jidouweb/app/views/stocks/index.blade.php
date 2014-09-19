@extends('layouts.scaffold')

@section('main')

<h1>All Stocks</h1>

<p>{{ link_to_route('stocks.create', 'Add New Stock', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($stocks->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Terminal_id</th>
				<th>Product_id</th>
				<th>Price_override</th>
				<th>Price</th>
				<th>Order</th>
				<th>Promo_type</th>
				<th>Promo_id</th>
				<th>Related_stock</th>
				<th>Ad_id</th>
				<th>Quantity</th>
				<th>Hw_id</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($stocks as $stock)
				<tr>
					<td>{{{ $stock->terminal_id }}}</td>
					<td>{{{ $stock->product_id }}}</td>
					<td>{{{ $stock->price_override }}}</td>
					<td>{{{ $stock->price }}}</td>
					<td>{{{ $stock->order }}}</td>
					<td>{{{ $stock->promo_type }}}</td>
					<td>{{{ $stock->promo_id }}}</td>
					<td>{{{ $stock->related_stock }}}</td>
					<td>{{{ $stock->ad_id }}}</td>
					<td>{{{ $stock->quantity }}}</td>
					<td>{{{ $stock->hw_id }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('stocks.destroy', $stock->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('stocks.edit', 'Edit', array($stock->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no stocks
@endif

@stop
