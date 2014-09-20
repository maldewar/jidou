<?php

return array(
    'library'     => 'imagick',
    'upload_dir'  => 'uploads',
    'upload_path' => public_path() . '/uploads/',
    'quality'     => 85,
    'dimensions' => array(
      'small_thumb' => array(50, 50, true, 75),
      'thumb'  => array(100, 100, true,  80),
      'mediumv' => array(200, 400, true, 90),
      'largev' => array(250, 600, true, 85),
      'mediumh' => array(400, 250, true, 90),
      'largeh' => array(600, 350, true, 85),
    ),
);
