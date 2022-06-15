<?php

namespace App\Page\ExamPage;

use App\Projector\ExamProjector\ExamDatesProjector;

class ExamDatesPage 
{
  public function __construct(private ExamDatesProjector $examDatesProjector) {}

  public function returnHtml(): bool|array|string
  {
    return $this->examDatesProjector->getHtml();
  }
}