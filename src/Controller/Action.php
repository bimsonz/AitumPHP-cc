<?php

namespace Aitum\CustomCode\Controller;

use Aitum\CustomCode\Model\ActionInterface;

class Action {
  public function trigger(ActionInterface $action, $payload): string {
    $action->execute($payload);

    return json_encode($action);
  }
}