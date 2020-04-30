<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class DummyTest extends WebTestCase
{
    /** @test */
    public function itShouldReturn200(): void
    {
        $client = self::createClient();

        $client->request('GET', '/dummy');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }
}
