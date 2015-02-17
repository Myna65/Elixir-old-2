<?php

namespace Myna65\ElixirBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Myna65\ElixirBundle\Entity\Person;

class PersonHandler
{
	private $om;
	private $entityClass;
	private $repository;
	
	public function __construct(ObjectManager $om, $entityClass)
	{
		$this->om = $om;
		$this->entityClass = $entityClass;
		$this->repository = $this->om->getRepository($this->entityClass);
	}
	
	
	/**
	 * Get a Person.
	 * 
	 * @param mixed $id
	 * 
	 * @return Person
	 */
	public function get($id)
	{
		$entity = $this->repository->find($id);
		return $entity;
	}
	
	private function createPerson()
	{
		return new  $this->entityClass;
	}
}