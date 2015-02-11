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



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Person
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return Person
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set vatNumber
     *
     * @param string $vatNumber
     * @return Person
     */
    public function setVatNumber($vatNumber)
    {
        $this->vatNumber = $vatNumber;

        return $this;
    }

    /**
     * Get vatNumber
     *
     * @return string 
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Person
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set civility
     *
     * @param \Myna65\ElixirBundle\Entity\Civility $civility
     * @return Person
     */
    public function setCivility(\Myna65\ElixirBundle\Entity\Civility $civility = null)
    {
        $this->civility = $civility;

        return $this;
    }

    /**
     * Get civility
     *
     * @return \Myna65\ElixirBundle\Entity\Civility 
     */
    public function getCivility()
    {
        return $this->civility;
    }

    /**
     * Set mandator
     *
     * @param \Myna65\ElixirBundle\Entity\Person $mandator
     * @return Person
     */
    public function setMandator(\Myna65\ElixirBundle\Entity\Person $mandator = null)
    {
        $this->mandator = $mandator;

        return $this;
    }

    /**
     * Get mandator
     *
     * @return \Myna65\ElixirBundle\Entity\Person 
     */
    public function getMandator()
    {
        return $this->mandator;
    }
}
