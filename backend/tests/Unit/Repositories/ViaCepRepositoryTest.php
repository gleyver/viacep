<?php

namespace Tests\Unit\Repositories;

use App\DTOs\CepResponseDTO;
use App\Repositories\ViaCepRepository;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViaCepRepositoryTest extends TestCase
{
    private ViaCepRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new ViaCepRepository();
    }

    public function test_deve_retornar_dto_quando_cep_existir(): void
    {
        // Arrange
        Http::fake([
            'viacep.com.br/ws/01001000/json' => Http::response([
                'cep' => '01001-000',
                'logradouro' => 'Praça da Sé',
                'complemento' => 'lado ímpar',
                'bairro' => 'Sé',
                'localidade' => 'São Paulo',
                'uf' => 'SP',
                'ibge' => '3550308',
                'gia' => '1004',
                'ddd' => '11',
                'siafi' => '7107'
            ], 200)
        ]);

        // Act
        $response = $this->repository->buscarCep('01001000');

        // Assert
        Http::assertSent(function (Request $request) {
            return $request->url() === 'https://viacep.com.br/ws/01001000/json';
        });

        $this->assertInstanceOf(CepResponseDTO::class, $response);
        $this->assertEquals('01001-000', $response->cep);
        $this->assertEquals('Praça da Sé', $response->logradouro);
        $this->assertEquals('lado ímpar', $response->complemento);
        $this->assertEquals('Sé', $response->bairro);
        $this->assertEquals('São Paulo', $response->localidade);
        $this->assertEquals('SP', $response->uf);
        $this->assertEquals('3550308', $response->ibge);
        $this->assertEquals('1004', $response->gia);
        $this->assertEquals('11', $response->ddd);
        $this->assertEquals('7107', $response->siafi);
    }

    public function test_deve_retornar_null_quando_cep_nao_existir(): void
    {
        // Arrange
        Http::fake([
            'viacep.com.br/ws/00000000/json' => Http::response([
                'erro' => true
            ], 200)
        ]);

        // Act
        $response = $this->repository->buscarCep('00000000');

        // Assert
        Http::assertSent(function (Request $request) {
            return $request->url() === 'https://viacep.com.br/ws/00000000/json';
        });

        $this->assertNull($response);
    }

    public function test_deve_retornar_null_quando_api_retornar_erro(): void
    {
        // Arrange
        Http::fake([
            'viacep.com.br/ws/01001000/json' => Http::response([], 500)
        ]);

        // Act
        $response = $this->repository->buscarCep('01001000');

        // Assert
        Http::assertSent(function (Request $request) {
            return $request->url() === 'https://viacep.com.br/ws/01001000/json';
        });

        $this->assertNull($response);
    }
}
