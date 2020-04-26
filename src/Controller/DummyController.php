<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DummyController extends AbstractController
{
    /** @Route("/dummy", name="dummy_route") */
    public function dummy(): Response
    {
        return new Response("Hello world!", Response::HTTP_OK);
    }
}