<?php

namespace Myna65\ElixirBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Myna65\ElixirBundle\Entity\Person;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\Get;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class PersonController extends FOSRestController
{
    /**
     * @View()
     * @Get("/person/{id}")
     * @ApiDoc(
     *   resource=true,
     *   section="Relations",
     *   description="Get the person with the given id",
     *   
     *   output="Myn65\ElixirBundle\Entity\Person",
     * )
     * 
     * @param int $id person id
     * 
     * @return array
     * 
     * @throws NotFoundHttpException when person does not exists
     * 
     */
    public function getPersonAction($id)
    {
    	return $this->getOr404($id);
    }
    
    protected function getOr404($id)
    {
    	if(!($person = $this->container->get('myna65_elixir.person.handler')->get($id))) {
    		throw new NotFoundHttpException(sprintf('The person number \'%s\' was not found',$id));
    	}
    	
    	return $person;
    }
}
