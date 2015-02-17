<?php

namespace Myna65\ElixirBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Myna65\ElixirBundle\Tests\Fixtures\Entity\LoadPersonData;

class PersonControllerTest extends WebTestCase
{
	public function customSetUp($fixtures)
	{
		$this->client = static::createClient();
		$this->loadFixtures($fixtures);
	}
	
	public function testJsonGetPersonAction()
	{
		$fixtures = array('Myna65\ElixirBundle\Tests\Fixtures\Entity\LoadPersonData');
		$this->customSetUp($fixtures);
		$people = LoadPersonData::$people;
		$person = array_pop($people);
		
		$route = $this->getUrl('api_1_get_person',array('id' => $person->getId()));
		
		$this->client->request('GET',$route, array('ACCEPT' => 'application/json'));
		$response = $this->client->getResponse();
		$this->assertJsonResponse($response);
		$content = $response->getContent();
		
		$decoded = json_decode($content, true);
		$this->assertTrue(isset($decoded['id']));
		$this->assertTrue(isset($decoded['surname']));
		$this->assertTrue(isset($decoded['name']));
		
		$route = $this->getUrl('api_1_get_person',array('id' => $person->getId()+1));
		
		$this->client->request('GET',$route, array('ACCEPT' => 'application/json'));
		$response = $this->client->getResponse();
		$this->assertJsonResponse($response,404);
	}
		
	protected function assertJsonResponse(Response $response, $statusCode = 200, $checkValidJson = true, $contentType = 'application/json')
	{
		$this->assertEquals(
				$statusCode,
				$response->getStatusCode(),
				$response->getContent()
		);
		
		$this->assertTrue(
				$response->headers->contains('Content-Type', $contentType),
				$response->headers
		);
		
		if($checkValidJson) {
			$decode = json_decode($response->getContent());
			$this->assertTrue(($decode != null && $decode != false),
					'is response valid json :['.$response->getContent().']'
			);
		}
	}
}