<?php

namespace Aitum\CustomCode\Enum;

enum InputType: int
{
  case INT = 0;
  case FLOAT = 1;
  case STRING = 2;
  case BOOL = 3;

  public static function fromId(int $id): self
  {
    return match($id)
    {
      0 => self::INT,
      1 => self::FLOAT,
      2 => self::STRING,
      3 => self::BOOL,
    };
  }
}