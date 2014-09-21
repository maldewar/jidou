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
    return Product::getImage($this->id, '');
  }

  public function getThumb() {
    return Product::getImage($this->id, 't');
  }

  public function getImageV() {
    return Product::getImage($this->id, 'v');
  }

  public function getImageLargeV() {
    return Product::getImage($this->id, 'largeV');
  }

  public function getImageH() {
    return Product::getImage($this->id, 'h');
  }
  
  public function getImageLargeH() {
    return Product::getImage($this->id, 'largeH');
  }

  public static function getImage($id, $size_desc) {
    $size_chunk = '50x50_crop';
    switch($size_desc) {
      case 't':
        $size_chunk = '100x100_crop';
        break;
      case 'v':
        $size_chunk = '200x400_crop';
        break;
      case 'largeV':
        $size_chunk = '300x600_crop';
        break;
      case 'h':
        $size_chunk = '400x250_crop';
        break;
      case 'largeH':
        $size_chunk = '600x350_crop';
        break;
    }
    return asset('uploads/products/' . $id . '/' . $size_chunk . '/main.jpg');
  }

}
