<?php

namespace AleBatistella\BlingErpApi\Helpers;

if (!function_exists(__NAMESPACE__ . "\\convertDateToString")) {
    /**
     * Converte uma data para o formato YYYY-MM-DD.
     *
     * @param \DateTimeInterface $date
     *
     * @return string
     */
    function convertDateToString(\DateTimeInterface $date): string
    {
        return $date->format("Y-m-d");
    }
}

if (!function_exists(__NAMESPACE__ . "\\convertDateTimeToString")) {
    /**
     * Converte uma data para o formato YYYY-MM-DD HH:MM:SS.
     *
     * @param \DateTimeInterface $date
     *
     * @return string
     */
    function convertDateTimeToString(\DateTimeInterface $date): string
    {
        return $date->format("Y-m-d H:i:s");
    }
}

if (!function_exists(__NAMESPACE__ . "\\objectToArray")) {
    /**
     * Converte um objeto em array.
     *
     * @param object $obj
     *
     * @return array
     */
    function objectToArray(object $obj): array
    {
        return json_decode(json_encode($obj), true);
    }
}
