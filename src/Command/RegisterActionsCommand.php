<?php

namespace Aitum\CustomCode\Command;

use Aitum\Command\ApiCommandInterface;
use Aitum\CustomCode\Model\ActionCollection;
use Aitum\Model\ApiCommandRequest;

class RegisterActionsCommand implements ApiCommandInterface {

  public function __construct(
    protected ActionCollection $actions
  ) {
  }

  public function execute(): ApiCommandRequest {
    $payload = [
      'id' => $_ENV['AITUM_CC_ID'],
      'name' => $_ENV['AITUM_CC_HOST'],
      'actions' => $this->actions,
    ];

    return new ApiCommandRequest(
      '/cc/register',
      'POST',
      json_encode($payload)
    );
  }

}