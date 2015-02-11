<?php

namespace Myna65\ElixirBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact", indexes={@ORM\Index(name="fk_contact_contact_type1_idx", columns={"contact_type_id"}), @ORM\Index(name="fk_contact_person1_idx", columns={"person_id"})})
 * @ORM\Entity
 */
class Contact
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=45, nullable=false)
     */
    private $value;

    /**
     * @var \ContactType
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="ContactType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contact_type_id", referencedColumnName="id")
     * })
     */
    private $contactType;

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
     * Set id
     *
     * @param integer $id
     * @return Contact
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Set value
     *
     * @param string $value
     * @return Contact
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set contactType
     *
     * @param \Myna65\ElixirBundle\Entity\ContactType $contactType
     * @return Contact
     */
    public function setContactType(\Myna65\ElixirBundle\Entity\ContactType $contactType = null)
    {
        $this->contactType = $contactType;

        return $this;
    }

    /**
     * Get contactType
     *
     * @return \Myna65\ElixirBundle\Entity\ContactType 
     */
    public function getContactType()
    {
        return $this->contactType;
    }

    /**
     * Set person
     *
     * @param \Myna65\ElixirBundle\Entity\Person $person
     * @return Contact
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
