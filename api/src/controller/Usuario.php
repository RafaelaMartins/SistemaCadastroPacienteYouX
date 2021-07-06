<?php

namespace Api\Controller;

use Api\Models\Conect;
use Symfony\Component\HttpFoundation\JsonResponse;


class Usuario 
{ 
 public function __construct($rota)
    {
        $this->rota = $rota;
        $this->respostaJson = new JsonResponse();
        $this->conexao = Conect::conexao();
    }
}