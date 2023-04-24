<?php

namespace Aitum\CustomCode\Model;

interface ActionInterface extends \JsonSerializable {

  public function id(): string;

  public function name(): string;

  public function inputs(): ?InputCollection;

  public function execute($payload): void;
}