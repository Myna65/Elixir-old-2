<?php

namespace Myna65\ElixirBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Myna65\ElixirBundle\Entity\Person;
use Symfony\Component\Form\FormFactoryInterface;

class PersonHandler
{
	private $om;
	private $entityClass;
	private $repository;
	private $formFactory;
	
	public function __construct(ObjectManager $om, $entityClass, FormFactoryInterface $formFactory)
	{
		$this->om = $om;
		$this->entityClass = $entityClass;
		$this->repository = $this->om->getRepository($this->entityClass);
		$this->formFactory = $formFactory;
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
	
	/**
	 * Create new Person
	 * 
	 * @param array $parameters
	 * 
	 * @return Person
	 */
	public function post(array $parameters)
	{
		$person = $this->createPerson();
		
		return $this->processForm($person, $parameters, 'POST');
	}
	
	private function processForm(Person $person, array $parameters, $method = 'PUT')
	{
		$form = $this->formFactory->create(new Person(), $person, array('method' => $method));
		$form->submit($parameters, 'PATCH' !== $method);
		if($form->isValid())
		{
			$person = $form->getData();
			$this->om->persist($person);
			$this->om->flush();
			
			return $person;
		}	
		
		throw new InvalidFormException('Invalid submitted data',$form);
		
	}
	
	
	private function createPerson()
	{
		return new  $this->entityClass;
	}
}