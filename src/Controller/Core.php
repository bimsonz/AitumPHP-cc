<?php

namespace Aitum\CustomCode\Controller;

class Core {

  public function heartbeat($params, $payload): string {
    return json_encode(['message' => 'OK.']);
  }

}