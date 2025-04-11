<?php

namespace App\Interfaces;

use App\DTOs\CepResponseDTO;

interface CepRepositoryInterface
{
    /**
     * Busca informações de um CEP
     *
     * @param string $cep
     * @return CepResponseDTO|null
     */
    public function buscarCep(string $cep): ?CepResponseDTO;
}
