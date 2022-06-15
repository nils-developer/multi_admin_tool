<?php

namespace App;

class PHPVariablesWrapper
{
  public function getUri()
  {
    return $_SERVER['REQUEST_URI'];
  }
}