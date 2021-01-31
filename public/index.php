<?php

$loader = require __DIR__.'/../vendor/autoload.php';
$db = new \Service\database();

$root = __DIR__ . DIRECTORY_SEPARATOR . '..';

//Twig configuration
$template_path = $root . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "templates";
$loader = new \Twig\Loader\FilesystemLoader($template_path);

$twig = new \Twig\Environment($loader, [
    'cache' =>  false,
    'debug' => true,
]);

$twig->addExtension(new \Twig\Extension\DebugExtension());




// Route
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$session = new \App\Services\controlSession();

include __DIR__ . DIRECTORY_SEPARATOR .  "routes.php";


$path = $request->getPathInfo();

if (isset($map[$path])) {
    ob_start();
    extract($request->query->all(), EXTR_SKIP);
    $controller_path = sprintf($root . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "Controllers" . DIRECTORY_SEPARATOR . '%s.php', $map[$path]);
    include $controller_path;

    $response = new Response(ob_get_clean());
} else {
    $response = new Response('Not Found', 404);
}

$response->send();



