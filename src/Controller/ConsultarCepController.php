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
     * @throws GuzzleException
     */
    #[Route(path: '/consulta-via-cep/{cep}', name: 'via_cep', methods: ['GET'])]
    public function consultaCepAction(int $cep)
    {

        $request = $this->client->request('GET', "viacep.com.br/ws/{$cep}/json/");
        $contentsDecode = json_decode($request->getBody()->getContents());

        return new JsonResponse($contentsDecode);
    }
}