<?php

namespace App\Projector\ExamProjector;

class AddExamProjector
{
  private string $basePath = __DIR__ . '/../../../html/';

  public function getHtml(): array|bool|string
  {
    $htmlTemplate = file_get_contents($this->basePath . 'exam/addExam.html');
    $head = file_get_contents($this->basePath . '__parts/__head.html');
    $aside = file_get_contents($this->basePath. '__parts/__aside.html');
    $footer = file_get_contents($this->basePath . '__parts/__footer.html');

    $head = str_replace('%pathToStyles%', '../../styles', $head);
    
    $htmlTemplate = str_replace('%head%', $head, $htmlTemplate);
    $htmlTemplate = str_replace('%aside%', $aside, $htmlTemplate);
    $htmlTemplate = str_replace('%footer%', $footer, $htmlTemplate);

    return $htmlTemplate;
  }
}