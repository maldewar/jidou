@extends('layouts.scaffold')

@section('main')

<h1>Show Product</h1>

<p>{{ link_to_route('products.index', 'Return to All products', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
    <tr>
      <th>ID</th>
      <th>&nbsp;</th>
			<th>Sku</th>
				<th>Title</th>
				<th>Desc</th>
				<th>Price</th>
				<th>Slogan</th>
				<th>Meta</th>
		</tr>
	</thead>

	<tbody>
    <tr>
      <td>{{{ $product->id }}}</td>
          <td><img src="{{{ $product->getSmallThumb() }}}"/></td>
			<td>{{{ $product->sku }}}</td>
					<td>{{{ $product->title }}}</td>
					<td>{{{ $product->desc }}}</td>
					<td>{{{ $product->price }}}</td>
					<td>{{{ $product->slogan }}}</td>
					<td>{{{ $product->meta }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('products.destroy', $product->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('products.edit', 'Edit', array($product->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
