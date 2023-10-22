<?php

namespace App\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ConsultarCepController extends AbstractController
{
    protected Client $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $cep
     * @return JsonResponse
     * @throws GuzzleException
     */
    #[Route(path: '/consulta-via-cep/{cep}', name: 'via_cep', methods: ['GET'])]
    public function consultaCepAction(int $cep): JsonResponse
    {

        $request = $this->client->request('GET', "viacep.com.br/ws/{$cep}/json/");
        $contentsDecode = json_decode($request->getBody()->getContents());

        return new JsonResponse($contentsDecode);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws GuzzleException
     */
    #[Route(path: '/pesquisar-cep', name: 'pesquisar_cep', methods: ['GET'])]
    public function pesquisarCepAction(Request $request): JsonResponse
    {
        $uf = $request->query->get('uf');
        $cidade = $request->query->get('cidade');
        $logradouro = $request->query->get('logradouro');

        $getRequest = $this->client->request('GET', "viacep.com.br/ws/{$uf}/{$cidade}/{$logradouro}/json/");
        $contentsDecode = json_decode($getRequest->getBody()->getContents());

        return new JsonResponse($contentsDecode);
    }
}