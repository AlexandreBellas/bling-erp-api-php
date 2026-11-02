<?php

if (!function_exists("fake")) {
    /**
     * Cria um gerador de dados fictícios para os testes.
     *
     * @return \Faker\Generator
     */
    function fake(): \Faker\Generator
    {
        return \Faker\Factory::create();
    }
}
