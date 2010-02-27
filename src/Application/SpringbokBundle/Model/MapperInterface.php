<?php

namespace Application\SpringbokBundle\Model;

interface MapperInterface
{
  public function toArray($object);

  public function fromArray(array $array);

  public function fromCursor(\MongoCursor $cursor);

  public function save($object);
}
