<?php

namespace Myna65\ElixirBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Document
 *
 * @ORM\Table(name="document", indexes={@ORM\Index(name="fk_document_person1_idx", columns={"person_id"})})
 * @ORM\Entity
 */
class Document
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
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="term_time", type="date", nullable=true)
     */
    private $termTime;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="vat_amount", type="string", length=45, nullable=false)
     */
    private $vatAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="internal_ref", type="string", length=45, nullable=false)
     */
    private $internalRef;

    /**
     * @var string
     *
     * @ORM\Column(name="extrenal_ref", type="string", length=45, nullable=true)
     */
    private $extrenalRef;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Move", inversedBy="document")
     * @ORM\JoinTable(name="import",
     *   joinColumns={
     *     @ORM\JoinColumn(name="document_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="move_id", referencedColumnName="id")
     *   }
     * )
     */
    private $move;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->move = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set time
     *
     * @param \DateTime $time
     * @return Document
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
     * Set termTime
     *
     * @param \DateTime $termTime
     * @return Document
     */
    public function setTermTime($termTime)
    {
        $this->termTime = $termTime;

        return $this;
    }

    /**
     * Get termTime
     *
     * @return \DateTime 
     */
    public function getTermTime()
    {
        return $this->termTime;
    }

    /**
     * Set amount
     *
     * @param string $amount
     * @return Document
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
     * Set vatAmount
     *
     * @param string $vatAmount
     * @return Document
     */
    public function setVatAmount($vatAmount)
    {
        $this->vatAmount = $vatAmount;

        return $this;
    }

    /**
     * Get vatAmount
     *
     * @return string 
     */
    public function getVatAmount()
    {
        return $this->vatAmount;
    }

    /**
     * Set internalRef
     *
     * @param string $internalRef
     * @return Document
     */
    public function setInternalRef($internalRef)
    {
        $this->internalRef = $internalRef;

        return $this;
    }

    /**
     * Get internalRef
     *
     * @return string 
     */
    public function getInternalRef()
    {
        return $this->internalRef;
    }

    /**
     * Set extrenalRef
     *
     * @param string $extrenalRef
     * @return Document
     */
    public function setExtrenalRef($extrenalRef)
    {
        $this->extrenalRef = $extrenalRef;

        return $this;
    }

    /**
     * Get extrenalRef
     *
     * @return string 
     */
    public function getExtrenalRef()
    {
        return $this->extrenalRef;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Document
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Document
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
     * Set person
     *
     * @param \Myna65\ElixirBundle\Entity\Person $person
     * @return Document
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

    /**
     * Add move
     *
     * @param \Myna65\ElixirBundle\Entity\Move $move
     * @return Document
     */
    public function addMove(\Myna65\ElixirBundle\Entity\Move $move)
    {
        $this->move[] = $move;

        return $this;
    }

    /**
     * Remove move
     *
     * @param \Myna65\ElixirBundle\Entity\Move $move
     */
    public function removeMove(\Myna65\ElixirBundle\Entity\Move $move)
    {
        $this->move->removeElement($move);
    }

    /**
     * Get move
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMove()
    {
        return $this->move;
    }
}
