<?php

namespace Symfony\Framework\WebBundle\Util;

class FileFilterIterator extends \FilterIterator
{
  public function accept()
  {
    $entry = $this->getInnerIterator()->current();
    return $entry->isFile();
  }
}
