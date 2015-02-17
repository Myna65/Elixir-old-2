<?php

namespace Myna65\ElixirBundle\Tests\Fixtures\Entity;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Myna65\ElixirBundle\Entity\Person;

class LoadPersonData implements FixtureInterface
{
	static public $people = array();
	
	public function load(ObjectManager $manager)
	{
		$person = new Person();
		$person->setName("John");
		$person->setSurname("Doe");
		
		$manager->persist($person);
		$manager->flush();
		
		self::$people[] = $person;
	}

}