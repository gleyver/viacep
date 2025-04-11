<?php

namespace Tests\Feature\Api\V1;

use App\DTOs\CepResponseDTO;
use App\Interfaces\CepRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CepControllerTest extends TestCase
{
    public function test_deve_retornar_cep_quando_existir(): void
    {
        // Arrange
        $cepMock = new CepResponseDTO(
            cep: '01001-000',
            logradouro: 'Praça da Sé',
            complemento: 'lado ímpar',
            bairro: 'Sé',
            localidade: 'São Paulo',
            uf: 'SP',
            ibge: '3550308',
            gia: '1004',
            ddd: '11',
            siafi: '7107'
        );

        $this->mock(CepRepositoryInterface::class)
            ->shouldReceive('buscarCep')
            ->once()
            ->with('01001000')
            ->andReturn($cepMock);

        // Act
        $response = $this->getJson('/api/v1/cep/01001000');

        // Assert
        $response->assertStatus(200)
            ->assertJson([
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
            ]);
    }

    public function test_deve_retornar_404_quando_cep_nao_existir(): void
    {
        // Arrange
        $this->mock(CepRepositoryInterface::class)
            ->shouldReceive('buscarCep')
            ->once()
            ->with('00000000')
            ->andReturn(null);

        // Act
        $response = $this->getJson('/api/v1/cep/00000000');

        // Assert
        $response->assertStatus(404);
    }

    public function test_deve_retornar_422_quando_cep_invalido(): void
    {
        // Act
        $response = $this->getJson('/api/v1/cep/123');

        // Assert
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['cep']);
    }
}
