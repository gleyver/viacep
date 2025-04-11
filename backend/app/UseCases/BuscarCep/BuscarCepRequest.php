<?php

namespace App\UseCases\BuscarCep;

class BuscarCepRequest
{
    public function __construct(
        public readonly string $cep
    ) {}
}
