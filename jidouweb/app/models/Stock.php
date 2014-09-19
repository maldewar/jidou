<?php

class Stock extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'terminal_id' => 'required',
		'product_id' => 'required',
		'price_override' => 'required',
		'price' => 'required',
		'order' => 'required',
		'promo_type' => 'required',
		'promo_id' => 'required',
		'related_stock' => 'required',
		'ad_id' => 'required',
		'quantity' => 'required',
		'hw_id' => 'required'
	);
}
