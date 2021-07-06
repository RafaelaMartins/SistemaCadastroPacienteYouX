<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header( 'content-type: text/html; charset=utf-8' );

// error_reporting(E_USER_NOTICE);
if($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
  header("Access-Control-Allow-Credentials: true");
  header('Access-Control-Request-Method:  username,token, password, Origin, X-Requested-With, Content-Type, Accept, Authorization'); 
  header('Access-Control-Allow-Headers: username, token, auth, password, Origin, X-Requested-With, Content-Type, Accept, Authorization');
  header('Access-Control-Allow-Methods: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, DELETE, PUT, POST, GET');
  die;
}

error_reporting(E_USER_NOTICE);

require_once __DIR__ . '/conect/conexao.php';
require_once __DIR__ . '/../vendor/autoload.php';

session_start();
use Symfony\Component\HttpFoundation\JsonResponse;
use CoffeeCode\Router\Router;

$rotas = new Router(URL_API);
$rotas->namespace('\\api\Controller')->group(null);
$rotas->get("/", "Erro");
$rotas->post("/adiciona", "Usuario:adicionaUsuario");
$rotas->dispatch();


if($rotas->error()){
  $response = new JsonResponse();
  $response->setData([
    'status'=>false,
    'message'=>'Não foi possivel completar a requisição',
    'data' => []
])->setStatusCode(500)->send();
  die;
}