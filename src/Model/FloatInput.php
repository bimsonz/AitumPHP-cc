<?php

namespace Aitum\CustomCode\Model;

use Aitum\CustomCode\Enum\InputType;

class FloatInput extends AbstractInput implements InputInterface {
  public function type(): InputType {
    return InputType::FLOAT;
  }

}