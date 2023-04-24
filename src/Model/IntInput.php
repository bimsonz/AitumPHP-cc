<?php

namespace Aitum\CustomCode\Model;

use Aitum\CustomCode\Enum\InputType;

class IntInput extends AbstractInput implements InputInterface {
  public function type(): InputType {
    return InputType::INT;
  }

}