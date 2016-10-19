<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/result');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Geen vragen gevonden', $client->getResponse()->getContent());
    }

}
