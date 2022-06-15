<?php

namespace App\Page\ExamPage;

use App\Projector\ExamProjector\AddExamProjector;

class AddExamPage
{
  public function __construct(private AddExamProjector $addExamProjector) {}

  public function returnHtml(): bool|array|string
  {
    return $this->addExamProjector->getHtml();
  }
}