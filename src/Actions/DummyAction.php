<?php

namespace Aitum\CustomCode\Actions;

use Aitum\CustomCode\Model\ActionInterface;
use Aitum\CustomCode\Model\BooleanInput;
use Aitum\CustomCode\Model\FloatInput;
use Aitum\CustomCode\Model\InputCollection;
use Aitum\CustomCode\Model\IntInput;
use Aitum\CustomCode\Model\StringInput;
use Colors\Color;

class DummyAction extends AbstractAction implements ActionInterface {

  public function name(): string {
    return 'DummyAction';
  }

  public function inputs(): ?InputCollection {
    $inputs = new InputCollection();

    $inputs->addInput(
      new IntInput('testIntInput', 'How old are you?')
    );

    $inputs->addInput(
      new FloatInput('testFloatInput', 'Volume level')
    );

    $inputs->addInput(
      new StringInput('testStringInput', 'What is your name?')
    );

    $inputs->addInput(
      new BooleanInput('testBooleanInput', 'Are you a fun person?')
    );

    return $inputs;
  }

  public function execute($payload): void {
    $io = new Color();
    echo $io('DUMMY ACTION')->green()->bold() . PHP_EOL;
  }

}