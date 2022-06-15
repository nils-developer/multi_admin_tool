<?php

namespace App\Page;

use App\Projector\DashboardProjector;

class DashboardPage
{
  public function __construct(private DashboardProjector $dashboardProjector) {}

  public function returnHtml(): bool|array|string
  {
    return $this->dashboardProjector->getHtml();
  }
}