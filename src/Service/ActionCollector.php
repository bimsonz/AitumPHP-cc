<?php

namespace Aitum\CustomCode\Service;

use Aitum\CustomCode\Model\ActionCollection;
use Aitum\CustomCode\Model\ActionInterface;
use Colors\Color;
use DirectoryIterator;
use ReflectionClass;

class ActionCollector {

  public function collect(): ActionCollection {
    $dirIterator = new DirectoryIterator(__DIR__ . '/../Actions');

    $actionCollection = new ActionCollection();
    foreach ($dirIterator as $file) {
      if (!$file->isFile() || $file->getExtension() !== 'php') {
        continue;
      }

      $className = $this->getFQCNFromFile($file->getPathname());
      if ($className === null) {
        continue;
      }

      $reflectionClass = new ReflectionClass($className);

      if ($reflectionClass->implementsInterface(ActionInterface::class)) {
        $action = new ($reflectionClass->getName());

        $io = new Color();
        echo $io('AitumPHP CC: ' . $action->name() . ' registered.')->cyan()->bold() . PHP_EOL;

        $actionCollection->addAction($action);
      }
    }

    return $actionCollection;
  }

  private function getFQCNFromFile(string $filePath): ?string {
    $content = file_get_contents($filePath);
    $namespace = $class = '';

    if (preg_match('/namespace\s+([a-zA-Z0-9_\\\]+)\s*;/', $content, $matches)) {
      $namespace = $matches[1];
    }

    if (preg_match('/class\s+([a-zA-Z0-9_]+)\s*(?:extends\s+[a-zA-Z0-9_\\\]+)?\s*(?:implements\s+[a-zA-Z0-9_\\\,]+)?\s*{/', $content, $matches)) {
      $class = $matches[1];
    }

    if (empty($namespace) || empty($class)) {
      return null;
    }

    return "$namespace\\$class";
  }
}