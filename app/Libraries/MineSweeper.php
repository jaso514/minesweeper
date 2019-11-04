<?php

namespace App\Libraries;

class MineSweeper {
  private $config;
  
  function __construct($difficult = null) {
    if ($difficult) {
      $this->configure($difficult);
    }
  }
  
  public function getData() {
    return $this->config;
  }
  
  public function configure($difficult) {
    switch ($difficult) {
      case 2:
        $data = [
            'rows' => 16,
            'cols' => 16,
            'mines' => 40
        ];
        break;
      case 3:
        $data = [
            'rows' => 20,
            'cols' => 30,
            'mines' => 90
        ];
        break;
      default:
        $data = [
            'rows' => 9,
            'cols' => 9,
            'mines' => 10
        ];
        break;
    }
    
    $this->config = $data;
  }
}