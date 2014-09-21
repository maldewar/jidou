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

  // ADD_CREDIT       1
  // PRODUCT_DISPENSE 2
  public static function addEvent($terminal_id, $event, $value) {
    DB::table('terminal_events')
        ->insert(array('terminal_id' => $terminal_id,
          'event' => $event,
          'value' => $value));
  }

}
