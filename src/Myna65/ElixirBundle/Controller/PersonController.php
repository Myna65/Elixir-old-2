<?php

namespace Myna65\ElixirBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Myna65\ElixirBundle\Entity\Person;


class PersonController extends FOSRestController
{
    /**
     * @View(template = "Myna65ElixirBundle:Person:person.html.twig");
     * @ParamConverter("person", class="Myna65ElixirBundle:Person")
     */
    public function getPersonAction(Person $person)
    {
    	return $person;
    }
}
