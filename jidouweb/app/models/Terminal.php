<?php

class Terminal extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		//'latitude' => 'required',
		//'longitude' => 'required',
		//'company_id' => 'required',
		//'type' => 'required'
	);
}
