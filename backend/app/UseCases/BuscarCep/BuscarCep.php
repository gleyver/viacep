<?php

namespace App\UseCases\BuscarCep;

use App\DTOs\CepResponseDTO;
use App\Interfaces\CepRepositoryInterface;

class BuscarCep
{
    public function __construct(
        private readonly CepRepositoryInterface $cepRepository
    ) {}

    public function execute(BuscarCepRequest $request): ?CepResponseDTO
    {
        return $this->cepRepository->buscarCep($request->cep);
    }
}
