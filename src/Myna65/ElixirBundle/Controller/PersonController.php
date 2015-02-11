<?php

namespace Myna65\ElixirBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Myna65\ElixirBundle\Entity\Person;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class PersonController extends FOSRestController
{
    /**
     * @View(template = "Myna65ElixirBundle:Person:person.html.twig")
     * @ParamConverter("person", class="Myna65ElixirBundle:Person")
     * @ApiDoc(
     *   resource=true,
     *   section="Relations",
     *   description="Get the person with the given id",
     *   requirements={
     *   	{"name"="id", "dataType"="integer", "requirement"="\d+", "description"="The id of the requested person"}
     *   },
     *   output="Myn65\ElixirBundle\Entity\Person",
     *   statusCodes={
     *   	200="Returned when successfull",
     *   	404="Returned when the resource is not found"
     *   }
     * )
     */
    public function getPersonAction(Person $id)
    {
    	return $id;
    }
}
