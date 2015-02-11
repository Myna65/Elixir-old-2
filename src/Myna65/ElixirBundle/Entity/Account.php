<?php

namespace Myna65\ElixirRelationsBundle\Entity;

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


}
