<?php

if (!function_exists('convertDateToString')) {
  /**
   * Converte uma data para o formato YYYY-MM-DD.
   *
   * @param \DateTimeInterface $date
   *
   * @return string
   */
  function convertDateToString(\DateTimeInterface $date): string
  {
    return $date->format('Y-m-d');
  }
}

if (!function_exists('convertDateTimeToString')) {
  /**
   * Converte uma data para o formato YYYY-MM-DD HH:MM:SS.
   *
   * @param \DateTimeInterface $date
   *
   * @return string
   */
  function convertDateTimeToString(\DateTimeInterface $date): string
  {
    return $date->format('Y-m-d H:i:s');
  }
}

if (!function_exists('fake')) {
  /**
   * Cria objeto para dados _fake_.
   *
   * @return \Faker\Generator
   */
  function fake(): \Faker\Generator
  {
    return \Faker\Factory::create();
  }
}

if (!function_exists('objectToArray')) {
  /**
   * Converte um objeto em _array_.
   *
   * @return array
   */
  function objectToArray(object $obj): array
  {
    return json_decode(json_encode($obj), true);
  }
}
