<?php

class Product extends Eloquent {
	protected $guarded = array('image');

	public static $rules = array(
		'sku' => 'required',
		'title' => 'required',
		'desc' => 'required',
		'price' => 'required'
	);

  public function getSmallThumb() {
    return asset('uploads/products/' . $this->id . '/50x50_crop/main.jpg');
  }

  public function getThumb() {
    return asset('uploads/products/' . $this->id . '/100x100_crop/main.jpg');
  }

  public function getImage() {
    return asset('uploads/products/' . $this->id . '/300x200_crop/main.jpg');
  }
}
