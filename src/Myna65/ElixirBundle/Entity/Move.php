<?php

namespace Myna65\ElixirBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Move
 *
 * @ORM\Table(name="move")
 * @ORM\Entity
 */
class Move
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
     * @var string
     *
     * @ORM\Column(name="internal_ref", type="string", length=45, nullable=true)
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
     * @ORM\Column(name="type", type="string", nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $amount;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Document", mappedBy="move")
     */
    private $document;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Stock", inversedBy="move")
     * @ORM\JoinTable(name="stock_move",
     *   joinColumns={
     *     @ORM\JoinColumn(name="move_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="stock_id", referencedColumnName="id")
     *   }
     * )
     */
    private $stock;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->document = new \Doctrine\Common\Collections\ArrayCollection();
        $this->stock = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Move
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
     * Set internalRef
     *
     * @param string $internalRef
     * @return Move
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
     * @return Move
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
     * @return Move
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
     * Set amount
     *
     * @param string $amount
     * @return Move
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
     * Add document
     *
     * @param \Myna65\ElixirBundle\Entity\Document $document
     * @return Move
     */
    public function addDocument(\Myna65\ElixirBundle\Entity\Document $document)
    {
        $this->document[] = $document;

        return $this;
    }

    /**
     * Remove document
     *
     * @param \Myna65\ElixirBundle\Entity\Document $document
     */
    public function removeDocument(\Myna65\ElixirBundle\Entity\Document $document)
    {
        $this->document->removeElement($document);
    }

    /**
     * Get document
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Add stock
     *
     * @param \Myna65\ElixirBundle\Entity\Stock $stock
     * @return Move
     */
    public function addStock(\Myna65\ElixirBundle\Entity\Stock $stock)
    {
        $this->stock[] = $stock;

        return $this;
    }

    /**
     * Remove stock
     *
     * @param \Myna65\ElixirBundle\Entity\Stock $stock
     */
    public function removeStock(\Myna65\ElixirBundle\Entity\Stock $stock)
    {
        $this->stock->removeElement($stock);
    }

    /**
     * Get stock
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStock()
    {
        return $this->stock;
    }
}
