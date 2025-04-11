<?php

namespace App\Repositories\Contracts;

interface CepRepositoryInterface
{
    /**
     * Busca informações de um CEP na API ViaCEP
     *
     * @param string $cep
     * @return array|null
     */
    public function buscarCep(string $cep): ?array;
}
