<?php

namespace Myna65\ElixirBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voucher
 *
 * @ORM\Table(name="voucher", uniqueConstraints={@ORM\UniqueConstraint(name="number_UNIQUE", columns={"number"})}, indexes={@ORM\Index(name="fk_voucher_document1_idx", columns={"ticket_intro_id"}), @ORM\Index(name="fk_voucher_document2_idx", columns={"ticket_out_id"})})
 * @ORM\Entity
 */
class Voucher
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
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $amount;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
    private $number;

    /**
     * @var \Document
     *
     * @ORM\ManyToOne(targetEntity="Document")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ticket_intro_id", referencedColumnName="id")
     * })
     */
    private $ticketIntro;

    /**
     * @var \Document
     *
     * @ORM\ManyToOne(targetEntity="Document")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ticket_out_id", referencedColumnName="id")
     * })
     */
    private $ticketOut;



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
     * Set amount
     *
     * @param string $amount
     * @return Voucher
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Voucher
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set ticketIntro
     *
     * @param \Myna65\ElixirBundle\Entity\Document $ticketIntro
     * @return Voucher
     */
    public function setTicketIntro(\Myna65\ElixirBundle\Entity\Document $ticketIntro = null)
    {
        $this->ticketIntro = $ticketIntro;

        return $this;
    }

    /**
     * Get ticketIntro
     *
     * @return \Myna65\ElixirBundle\Entity\Document 
     */
    public function getTicketIntro()
    {
        return $this->ticketIntro;
    }

    /**
     * Set ticketOut
     *
     * @param \Myna65\ElixirBundle\Entity\Document $ticketOut
     * @return Voucher
     */
    public function setTicketOut(\Myna65\ElixirBundle\Entity\Document $ticketOut = null)
    {
        $this->ticketOut = $ticketOut;

        return $this;
    }

    /**
     * Get ticketOut
     *
     * @return \Myna65\ElixirBundle\Entity\Document 
     */
    public function getTicketOut()
    {
        return $this->ticketOut;
    }
}
