<?php

namespace Aitum\CustomCode\Controller;

use Colors\Color;

class Core {

  public function heartbeat($params, $payload): string {
    $io = new Color();

    echo $io('AitumPHP CC: Connected successfully.')->cyan()->bold() . PHP_EOL;
    return json_encode(['message' => 'OK.']);
  }

}