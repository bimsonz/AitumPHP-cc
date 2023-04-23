<?php

namespace Aitum\CustomCode\Controller;

class Action {
  public function trigger($params, $payload): string {
    return json_encode(
      [
        'params' => $params,
        'payload' => $payload
      ]
    );
  }
}