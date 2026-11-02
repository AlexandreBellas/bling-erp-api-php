<?php

if (!function_exists("convertDateToString")) {
    /**
     * Converte uma data para o formato YYYY-MM-DD.
     */
    function convertDateToString(\DateTimeInterface $date): string
    {
        return \AleBatistella\BlingErpApi\Helpers\convertDateToString($date);
    }
}

if (!function_exists("convertDateTimeToString")) {
    /**
     * Converte uma data para o formato YYYY-MM-DD HH:MM:SS.
     */
    function convertDateTimeToString(\DateTimeInterface $date): string
    {
        return \AleBatistella\BlingErpApi\Helpers\convertDateTimeToString($date);
    }
}

if (!function_exists("objectToArray")) {
    /**
     * Converte um objeto em array.
     */
    function objectToArray(object $obj): array
    {
        return \AleBatistella\BlingErpApi\Helpers\objectToArray($obj);
    }
}
