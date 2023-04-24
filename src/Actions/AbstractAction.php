<?php

namespace Aitum\CustomCode\Actions;

use Aitum\CustomCode\Model\InputCollection;

abstract class AbstractAction implements \JsonSerializable {

  public function id(): string {
    return hash('sha1', $this->name());
  }

  abstract public function name(): string;

  abstract public function inputs(): ?InputCollection;

  abstract public function execute($payload): void;

  public function jsonSerialize(): array {
    return [
      'id' => $this->id(),
      'name' => $this->name(),
      'inputs' => $this->inputs(),
    ];
  }

}