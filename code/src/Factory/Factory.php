<?php

namespace App\Factory;

use App\Page\DashboardPage;
use App\Page\ExamPage\ExamDatesPage;
use App\Page\ExamPage\AddExamPage;
use App\Projector\DashboardProjector;
use App\Projector\ExamProjector\ExamDatesProjector;
use App\Projector\ExamProjector\AddExamProjector;
use App\Application;
use App\Router;
use App\PHPVariablesWrapper;
use App\Persistence\MySqlConnector;

class Factory 
{

  private MySqlConnector $connector;

  public function createApplication(MySqlConnector $connector): Application
  {

    $this->connector = $connector;

    return new Application(
      new Router(
        $this->createVariablesWrapper(),
        $this->createDashboardPage(),
        $this->createExamDatesPage(),
        $this->createAddExamPage()
      )
    );
  }

  private function createDashboardPage(): DashboardPage
  {
    return new DashboardPage(
      new DashboardProjector()
    );
  }

  private function createExamDatesPage(): ExamDatesPage
  {
    return new ExamDatesPage(
      new ExamDatesProjector()
    );
  }

  private function createAddExamPage(): AddExamPage
  {
    return new AddExamPage(
      new AddExamProjector()
    );
  }

  private function createVariablesWrapper(): PHPVariablesWrapper
  {
    return new PHPVariablesWrapper();
  }
}