@extends('layouts.scaffold')

@section('main')

<h1>Show Terminal</h1>

<p>{{ link_to_route('terminals.index', 'Return to All terminals', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
				<th>Latitude</th>
				<th>Longitude</th>
				<th>Company_id</th>
				<th>Type</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $terminal->name }}}</td>
					<td>{{{ $terminal->latitude }}}</td>
					<td>{{{ $terminal->longitude }}}</td>
					<td>{{{ $terminal->company_id }}}</td>
					<td>{{{ $terminal->type }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('terminals.destroy', $terminal->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('terminals.edit', 'Edit', array($terminal->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
