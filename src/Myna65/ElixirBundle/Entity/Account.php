<?php

namespace Myna65\ElixirBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\Table(name="account", indexes={@ORM\Index(name="fk_account_bank1_idx", columns={"bank_id"}), @ORM\Index(name="fk_account_person1_idx", columns={"person_id"})})
 * @ORM\Entity
 */
class Account
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
     * @ORM\Column(name="IBAN", type="string", length=34, nullable=false)
     */
    private $iban;

    /**
     * @var \Bank
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Bank")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bank_id", referencedColumnName="id")
     * })
     */
    private $bank;

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
     * @return Account
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
     * Set iban
     *
     * @param string $iban
     * @return Account
     */
    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get iban
     *
     * @return string 
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Set bank
     *
     * @param \Myna65\ElixirBundle\Entity\Bank $bank
     * @return Account
     */
    public function setBank(\Myna65\ElixirBundle\Entity\Bank $bank)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get bank
     *
     * @return \Myna65\ElixirBundle\Entity\Bank 
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * Set person
     *
     * @param \Myna65\ElixirBundle\Entity\Person $person
     * @return Account
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
