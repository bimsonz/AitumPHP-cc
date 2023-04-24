<?php

namespace Aitum\CustomCode\Model;

use Aitum\CustomCode\Enum\InputType;

interface InputInterface {

  public function id(): string;

  public function type(): InputType;

  public function label(): string;

  public function required(): bool;
}