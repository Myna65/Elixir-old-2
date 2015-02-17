<?php

namespace Myna65\ElixirBundle\Tests\Handler;

use Myna65\ElixirBundle\Entity\Person;
use Myna65\ElixirBundle\Handler\PersonHandler;


class PersonHandlerTest extends \PHPUnit_Framework_TestCase
{
	const PERSON_CLASS='Myna65\ElixirBundle\Tests\Handler\DummyPerson';
	
	
	/** @var PersonHandler */
	protected $personHandler;
	
	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $om;
	
	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected  $repository;
	

	
	public function setUp()
	{
		if(!interface_exists('Doctrine\Common\Persistence\ObjectManager'))
		{
			$this->markTestSkipped('Doctrine has to be installed for this test to run');
		}
		
		$class = $this->getMock('Doctrine\Common\Persistence\Mapping\ClassMetadata');
		$this->om = $this->getMock('Doctrine\Common\Persistence\ObjectManager');
		$this->repository = $this->getMock('Doctrine\Common\Persistence\ObjectRepository');
		$this->formFactory = $this->getMock('Symfony\Component\Form\FormFactoryInterface');
		
		$this->om->expects($this->any())
				 ->method('getRepository')
				 ->with($this->equalTo(static::PERSON_CLASS))
				 ->will($this->returnValue($this->repository));
		
		$this->om->expects($this->any())
				 ->method('getClassMetadata')
				 ->with($this->equalTo(static::PERSON_CLASS))
				 ->will($this->returnValue($class));
		
		$class->expects($this->any())
			  ->method('getName')
			  ->will($this->returnValue(static::PERSON_CLASS));
	}

    public function testGet()
    { 
        $id=1;
        $person = $this->getPerson();
        $this->repository->expects($this->once())
        				 ->method('find')
        				 ->with($this->equalTo($id))
        				 ->will($this->returnValue($person));
        
        $this->personHandler = $this->createPersonHandler($this->om, static::PERSON_CLASS, $this->formFactory);
        
        $this->personHandler->get($id);
    } 
    
    
    protected function createPersonHandler($objectManager, $personClass, $formFactory)
    {
    	return new PersonHandler($objectManager, $personClass, $formFactory);
	}
	
	protected function getPerson()
	{
		$personClass = static::PERSON_CLASS;
		
		return new $personClass();
	}

}

class DummyPerson extends Person
{
}
