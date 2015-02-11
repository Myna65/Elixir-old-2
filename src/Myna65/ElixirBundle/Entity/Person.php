<?php

namespace Myna65\ElixirBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="person", uniqueConstraints={@ORM\UniqueConstraint(name="vat_number_UNIQUE", columns={"vat_number"})}, indexes={@ORM\Index(name="fk_person_civility1_idx", columns={"civility_id"}), @ORM\Index(name="name_index", columns={"name"}), @ORM\Index(name="fk_person_person1_idx", columns={"mandator_id"})})
 * @ORM\Entity
 */
class Person
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=45, nullable=true)
     */
    private $surname = '';

    /**
     * @var string
     *
     * @ORM\Column(name="vat_number", type="string", length=20, nullable=true)
     */
    private $vatNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var \Civility
     *
     * @ORM\ManyToOne(targetEntity="Civility")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="civility_id", referencedColumnName="id")
     * })
     */
    private $civility;

    /**
     * @var \Person
     *
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mandator_id", referencedColumnName="id")
     * })
     */
    private $mandator;


}
