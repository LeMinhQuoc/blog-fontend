<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//require_once "vendor/autoload.php";
use GuzzleHttp\Client;






//$arr_body = json_decode($body);
//print_r($arr_body);

class HomeController extends AbstractController
{
    /**
     * @Route("", name="app_home")
     */
    public function index(): Response
    {


        $client = new Client([
            'verify' => false,
            'base_uri' => 'https://127.0.0.1:8001',
        ]);
        $response = $client->request('GET', '/api/blogs', [
            'query' => [
                'page' => '1',
            ]
        ]);
        $body = $response->getBody()->getContents();
        $arr= json_decode($body,true);



        return $this->render('home/index.twig', array('output'=>$arr));
    }
}
