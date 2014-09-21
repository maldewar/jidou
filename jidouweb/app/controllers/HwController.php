<?php

class HwController extends \BaseController {

  public function creditAdded() {
    $terminal_id = (isset($_GET['id'])?intval($_GET['id']):0);
    $quantity = (isset($_GET['q'])?floatval($_GET['q']):0);
    if ($terminal_id > 0 && $quantity > 0) {
      error_log('Receieved ADD_CREDIT value ' . $quantity . ' event from terminal ' . $terminal_id);
      Terminal::addEvent($terminal_id, 1, $quantity);
    } else {
      error_log('method called without params.');
    }
  }

  public function dispenseDone() {
    $terminal_id = (isset($_GET['id'])?intval($_GET['id']):0);
    $product = (isset($_GET['p'])?floatval($_GET['p']):0);
    if ($terminal_id > 0 && $product > 0) {
      error_log('Receieved DISPENSE_DONE value ' . $product . ' event from terminal ' . $terminal_id);
      Terminal::addEvent($terminal_id, 2, $product);
    } else {
      error_log('method called without params.');
    }
  }

}
