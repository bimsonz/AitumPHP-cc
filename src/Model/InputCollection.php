<?php

namespace Aitum\CustomCode\Model;

class InputCollection implements \JsonSerializable {

  /**
   * @var \Aitum\CustomCode\Model\InputInterface[]
   */
  protected array $inputs = [];

  /**
   * @return \Aitum\CustomCode\Model\InputInterface[]
   */
  public function getInputs(): array {
    return $this->inputs;
  }

  /**
   * @param \Aitum\CustomCode\Model\InputInterface $inputs
   */
  public function addInput(InputInterface $input): void {
    $this->inputs[$input->id()] = $input;
  }


  public function jsonSerialize(): array {
    return $this->inputs;
  }

}