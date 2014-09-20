<?php

class Promo {
  private static $_arrTypes = array(
    0 => 'none',
    1 => 'facebook like',
    2 => 'take picture',
    4 => 'quizz'
  );

  public static function getTypes() {
    return Promo::$_arrTypes;
  }
}
