<?php

class Product extends Eloquent {
	protected $guarded = array('image');

  public static $orientations = array(
    0 => 'landscape',
    1 => 'portrait'
  );

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

  public function getImageV() {
    return asset('uploads/products/' . $this->id . '/200x400_crop/main.jpg');
  }

  public function getImageLargeV() {
    return asset('uploads/products/' . $this->id . '/250x600_crop/main.jpg');
  }

  public function getImageH() {
    return asset('uploads/products/' . $this->id . '/400x250_crop/main.jpg');
  }
  
  public function getImageLargeH() {
    return asset('uploads/products/' . $this->id . '/600x350_crop/main.jpg');
  }

}
