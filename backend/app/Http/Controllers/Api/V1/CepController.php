<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowCepRequest;
use App\UseCases\BuscarCep\BuscarCep;
use App\UseCases\BuscarCep\BuscarCepRequest as BuscarCepRequestDTO;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="API de Consulta de CEP",
 *     description="API para consulta de CEP utilizando o serviço ViaCEP"
 * )
 *
 * @OA\Server(
 *     url="http://localhost:8000/api",
 *     description="Servidor Local"
 * )
 */
class CepController extends Controller
{
    private BuscarCep $buscarCep;

    public function __construct(BuscarCep $buscarCep)
    {
        $this->buscarCep = $buscarCep;
    }

    /**
     * @OA\Get(
     *     path="/v1/cep/{cep}",
     *     summary="Busca informações de um CEP",
     *     tags={"CEP"},
     *     @OA\Parameter(
     *         name="cep",
     *         in="path",
     *         required=true,
     *         description="CEP a ser consultado (apenas números)",
     *         @OA\Schema(
     *             type="string",
     *             pattern="^[0-9]{8}$"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Informações do CEP encontradas",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="cep", type="string", example="01001-000"),
     *             @OA\Property(property="logradouro", type="string", example="Praça da Sé"),
     *             @OA\Property(property="complemento", type="string", example="lado ímpar"),
     *             @OA\Property(property="bairro", type="string", example="Sé"),
     *             @OA\Property(property="localidade", type="string", example="São Paulo"),
     *             @OA\Property(property="uf", type="string", example="SP"),
     *             @OA\Property(property="ibge", type="string", example="3550308"),
     *             @OA\Property(property="gia", type="string", example="1004"),
     *             @OA\Property(property="ddd", type="string", example="11"),
     *             @OA\Property(property="siafi", type="string", example="7107")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="CEP não encontrado"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="CEP inválido"
     *     )
     * )
     */
    public function show(ShowCepRequest $request)
    {
        $dto = new BuscarCepRequestDTO($request->cep);
        $response = $this->buscarCep->execute($dto);

        if ($response === null) {
            return response()->json(['message' => 'CEP não encontrado'], 404);
        }

        return response()->json($response);
    }
}
