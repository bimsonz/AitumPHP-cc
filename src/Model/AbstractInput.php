<?php

namespace Aitum\CustomCode\Model;

use Aitum\CustomCode\Enum\InputType;

abstract class AbstractInput implements \JsonSerializable {


  public function __construct(
    protected string $id,
    protected string $label,
    protected bool $required = false,
  ) {
  }

  public function id(): string {
    return $this->id;
  }

  abstract public function type(): InputType;

  public function label(): string {
    return $this->label;
  }

  public function required(): bool {
    return $this->required;
  }

  public function jsonSerialize(): array {
    return [
      'type' => $this->type(),
      'label' => $this->label(),
      'validation' => [
        'required' => $this->required(),
      ]
    ];
  }

}