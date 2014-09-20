<?php

class Stock extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'terminal_id' => 'required',
		'product_id' => 'required',
		//'price_override' => 'required',
		//'price' => 'required',
		//'order' => 'required',
		//'promo_type' => 'required',
		//'promo_id' => 'required',
		//'related_stock' => 'required',
		//'ad_id' => 'required',
		'quantity' => 'required',
		'hw_id' => 'required'
  );

  public static function getStock($terminal_id) {
    $terminal_stock = DB::table('stocks')
      ->leftJoin('products', 'stocks.product_id', '=', 'products.id')
      ->select('products.id',
        'products.sku',
        'products.title',
        'products.desc',
        'products.slogan',
        'products.price',
        'products.image_orientation',
        'stocks.quantity',
        'products.meta',
        'stocks.order',
        'stocks.hw_id',
        'stocks.promo_type',
        'stocks.promo_id',
        'stocks.ad_id')
      ->where('stocks.terminal_id', '=', $terminal_id)
      ->orderBy('stocks.order')->get();
    return $terminal_stock;
  }
}
