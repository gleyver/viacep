<?php

namespace App\DTOs;

class CepResponseDTO
{
    public function __construct(
        public readonly string $cep,
        public readonly string $logradouro,
        public readonly string $complemento,
        public readonly string $bairro,
        public readonly string $localidade,
        public readonly string $uf,
        public readonly string $ibge,
        public readonly string $gia,
        public readonly string $ddd,
        public readonly string $siafi
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            cep: $data['cep'],
            logradouro: $data['logradouro'],
            complemento: $data['complemento'],
            bairro: $data['bairro'],
            localidade: $data['localidade'],
            uf: $data['uf'],
            ibge: $data['ibge'],
            gia: $data['gia'],
            ddd: $data['ddd'],
            siafi: $data['siafi']
        );
    }
}
