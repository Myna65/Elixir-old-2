<?php

namespace Myna65\ElixirBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transfer
 *
 * @ORM\Table(name="transfer", indexes={@ORM\Index(name="fk_transfer_journal1_idx", columns={"from_id"}), @ORM\Index(name="fk_transfer_journal2_idx", columns={"to_id"})})
 * @ORM\Entity
 */
class Transfer
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
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=true)
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var \Journal
     *
     * @ORM\ManyToOne(targetEntity="Journal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="from_id", referencedColumnName="id")
     * })
     */
    private $from;

    /**
     * @var \Journal
     *
     * @ORM\ManyToOne(targetEntity="Journal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="to_id", referencedColumnName="id")
     * })
     */
    private $to;



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
     * @return Transfer
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
     * Set time
     *
     * @param \DateTime $time
     * @return Transfer
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Transfer
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
     * Set from
     *
     * @param \Myna65\ElixirBundle\Entity\Journal $from
     * @return Transfer
     */
    public function setFrom(\Myna65\ElixirBundle\Entity\Journal $from = null)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get from
     *
     * @return \Myna65\ElixirBundle\Entity\Journal 
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set to
     *
     * @param \Myna65\ElixirBundle\Entity\Journal $to
     * @return Transfer
     */
    public function setTo(\Myna65\ElixirBundle\Entity\Journal $to = null)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to
     *
     * @return \Myna65\ElixirBundle\Entity\Journal 
     */
    public function getTo()
    {
        return $this->to;
    }
}
