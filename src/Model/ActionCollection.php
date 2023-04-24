<?php

namespace Aitum\CustomCode\Model;

class ActionCollection implements \JsonSerializable {

  /**
   * @var \Aitum\CustomCode\Model\ActionInterface[]
   */
  protected array $actions = [];

  public function addAction(ActionInterface $action) {
    $this->actions[] = $action;
  }

  public function getActions(): array {
    return $this->actions;
  }

  public function getActionById(string $id):? ActionInterface {
    foreach ($this->actions as $action) {
      if ($action->id() != $id) {
        continue;
      }

      return $action;
    }
  }

  public function jsonSerialize(): array {
    return $this->actions;
  }

}