<?php

namespace App;

use App\PHPVariablesWrapper;
use App\Page\DashboardPage;
use App\Page\ExamPage\ExamDatesPage;
use App\Page\ExamPage\AddExamPage;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;

use Slim\App;

class Router
{
  public function __construct(
    private PHPVariablesWrapper $variablesWrapper,
    private DashboardPage $dashboardPage,
    private ExamDatesPage $examDatesPage,
    private AddExamPage $addExamPage
    )
  {}
  
  public function setRoutes(App $app): void
  {
    $baseUrl = '/php/admin/code/public/index.php';

    $app->group($baseUrl, function(RouteCollectorProxy $base) {

      $base->get('', function(Request $request, Response $response) {
        $outputHtml = $this->dashboardPage->returnHtml();
        $response->getBody()->write($outputHtml);
        return $response;
      });

      $base->get('/dashboard', function(Request $request, Response $response) {
        $outputHtml = $this->dashboardPage->returnHtml();
        $response->getBody()->write($outputHtml);
        return $response;
      });

      $base->group('/exam', function(RouteCollectorProxy $exam) {

        $exam->get('/exam-dates', function(Request $request, Response $response) {
          $outputHtml = $this->examDatesPage->returnHtml();
          $response->getBody()->write($outputHtml);
          return $response;
        });
  
        $exam->get('/add-exam', function(Request $request, Response $response) {
          $outputHtml = $this->addExamPage->returnHtml();
          $response->getBody()->write($outputHtml);
          return $response;
        });

      });

    });
  }
}

