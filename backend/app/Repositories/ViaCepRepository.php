<?php

namespace App\Repositories;

use App\DTOs\CepResponseDTO;
use App\Interfaces\CepRepositoryInterface;
use Illuminate\Support\Facades\Http;

class ViaCepRepository implements CepRepositoryInterface
{
    /**
     * URL base da API ViaCEP
     */
    private const BASE_URL = 'https://viacep.com.br/ws';

    /**
     * Busca informações de um CEP na API ViaCEP
     *
     * @param string $cep
     * @return CepResponseDTO|null
     */
    public function buscarCep(string $cep): ?CepResponseDTO
    {
        $response = Http::get(self::BASE_URL . "/{$cep}/json");

        if ($response->failed() || isset($response['erro'])) {
            return null;
        }

        return CepResponseDTO::fromArray($response->json());
    }
}
