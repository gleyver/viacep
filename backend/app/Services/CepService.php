<?php

namespace App\Services;

use App\DTOs\CepResponseDTO;
use App\Repositories\Contracts\CepRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class CepService
{
    public function __construct(
        private readonly CepRepositoryInterface $cepRepository
    ) {}

    public function buscarCep(string $cep): ?CepResponseDTO
    {
        $cep = preg_replace('/[^0-9]/', '', $cep);

        if (strlen($cep) !== 8) {
            return null;
        }

        return Cache::remember("cep:{$cep}", 60 * 60 * 24, function () use ($cep) {
            $dados = $this->cepRepository->buscarCep($cep);

            if (!$dados) {
                return null;
            }

            return CepResponseDTO::fromArray($dados);
        });
    }
}
