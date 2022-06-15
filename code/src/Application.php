<?php

namespace App;

use App\Router;
use App\PHPVariablesWrapper;

class Application 
{

  public function __construct(
    private Router $router,
    ) 
  {}

  public function startApp($app): void
  {
    $this->router->setRoutes($app);
  }
}