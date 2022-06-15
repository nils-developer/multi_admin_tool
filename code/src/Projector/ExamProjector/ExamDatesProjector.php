<?php

namespace App\Projector\ExamProjector;

class ExamDatesProjector
{
  private string $basePath = __DIR__ . '/../../../html/';

  public function getHtml(): array|bool|string
  {
    $htmlTemplate = file_get_contents($this->basePath . 'exam/examDates.html');
    $head = file_get_contents($this->basePath . '__parts/__head.html');
    $aside = file_get_contents($this->basePath . '__parts/__aside.html');
    $table = file_get_contents($this->basePath . 'exam/__examDatesTable.html');
    $footer = file_get_contents($this->basePath . '__parts/__footer.html');

    $head = str_replace('%pathToStyles%', '../../styles', $head);
    
    $htmlTemplate = str_replace('%head%', $head, $htmlTemplate);
    $htmlTemplate = str_replace('%aside%', $aside, $htmlTemplate);
    $htmlTemplate = str_replace('%table%', $table, $htmlTemplate);
    $htmlTemplate = str_replace('%footer%', $footer, $htmlTemplate);

    return $htmlTemplate;
  }
}