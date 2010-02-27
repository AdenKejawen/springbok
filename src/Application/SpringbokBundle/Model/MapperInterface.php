<?php

namespace Application\SpringbokBundle\Model;

interface MapperInterface
{
  static public function objectToArray($object);

  static public function arrayToObject(array $array, $className);

  public function save($object);
}
