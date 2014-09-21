<?php

class HwController extends \BaseController {

  public function creditAdded() {
    $terminal_id = (isset($_GET['id'])?intval($_GET['id']):0);
    $quantity = (isset($_GET['q'])?floatval($_GET['q']):0);
    if ($terminal_id > 0 && $quantity > 0) {
      error_log('Receieved ADD_CREDIT value ' . $quantity . ' event from terminal ' . $terminal_id);
    } else {
      error_log('method called without params.');
    }
  }

  public function dispenseDone() {
    $terminal_id = (isset($_GET['id'])?intval($_GET['id']):0);
    $quantity = (isset($_GET['p'])?floatval($_GET['p']):0);
    if ($terminal_id > 0 && $quantity > 0) {
      error_log('Receieved ADD_CREDIT value ' . $quantity . ' event from terminal ' . $terminal_id);
    } else {
      error_log('method called without params.');
    }
  }

}
