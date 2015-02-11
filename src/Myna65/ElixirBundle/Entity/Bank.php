<?php

namespace Myna65\ElixirBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bank
 *
 * @ORM\Table(name="bank", indexes={@ORM\Index(name="fk_bank_person1_idx", columns={"person_id"})})
 * @ORM\Entity
 */
class Bank
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
     * @ORM\Column(name="BIC", type="string", length=11, nullable=false)
     */
    private $bic;

    /**
     * @var \Person
     *
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     * })
     */
    private $person;



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
     * Set bic
     *
     * @param string $bic
     * @return Bank
     */
    public function setBic($bic)
    {
        $this->bic = $bic;

        return $this;
    }

    /**
     * Get bic
     *
     * @return string 
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * Set person
     *
     * @param \Myna65\ElixirBundle\Entity\Person $person
     * @return Bank
     */
    public function setPerson(\Myna65\ElixirBundle\Entity\Person $person = null)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \Myna65\ElixirBundle\Entity\Person 
     */
    public function getPerson()
    {
        return $this->person;
    }
}
