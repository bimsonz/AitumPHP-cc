<?php

namespace Aitum\CustomCode\Actions;

use Aitum\CustomCode\Model\ActionInterface;
use Colors\Color;

class DummyAction extends AbstractAction implements ActionInterface {

  public function name(): string {
    return 'DummyAction';
  }

  public function inputs(): ?array {
    return [
      'testStringInput' => [
        'type' => 2,
        'label' => 'What is your name?',
        'validation' => [
          'required' => false,
        ],
      ],
      'testBooleanInput' => [
        'type' => 3,
        'label' => 'Are you a fun person?',
        'validation' => [
          'required' => false,
        ],
      ],
      'testIntInput' => [
        'type' => 0,
        'label' => 'How old are you?',
        'validation' => [
          'required' => false,
        ],
      ],
      'testFloatInput' => [
        'type' => 1,
        'label' => 'Volume level',
        'validation' => [
          'required' => false,
        ],
      ],
    ];
  }

  public function execute($payload): void {
    $io = new Color();
    echo $io('DUMMY ACTION')->green()->bold() . PHP_EOL;
  }

}