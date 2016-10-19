<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Controller\CoachController;

class CoachControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }
}
