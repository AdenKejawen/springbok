<?php

namespace Application\SpringbokBundle\Model;

interface MapperInterface
{
  static public function toArray($object);

  static public function arrayToObject(array $array, $className);

  public function save($object);
}
