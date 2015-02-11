<?php

namespace Myna65\ElixirBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table(name="stock", indexes={@ORM\Index(name="fk_stock_product1_idx", columns={"product_id"}), @ORM\Index(name="fk_stock_person1_idx", columns={"person_id"})})
 * @ORM\Entity
 */
class Stock
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
     * @ORM\Column(name="receive_date", type="date", nullable=false)
     */
    private $receiveDate;

    /**
     * @var string
     *
     * @ORM\Column(name="cost_price", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $costPrice;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;

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
     * @ORM\ManyToMany(targetEntity="Move", mappedBy="stock")
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
     * Set receiveDate
     *
     * @param \DateTime $receiveDate
     * @return Stock
     */
    public function setReceiveDate($receiveDate)
    {
        $this->receiveDate = $receiveDate;

        return $this;
    }

    /**
     * Get receiveDate
     *
     * @return \DateTime 
     */
    public function getReceiveDate()
    {
        return $this->receiveDate;
    }

    /**
     * Set costPrice
     *
     * @param string $costPrice
     * @return Stock
     */
    public function setCostPrice($costPrice)
    {
        $this->costPrice = $costPrice;

        return $this;
    }

    /**
     * Get costPrice
     *
     * @return string 
     */
    public function getCostPrice()
    {
        return $this->costPrice;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Stock
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set product
     *
     * @param \Myna65\ElixirBundle\Entity\Product $product
     * @return Stock
     */
    public function setProduct(\Myna65\ElixirBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Myna65\ElixirBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set person
     *
     * @param \Myna65\ElixirBundle\Entity\Person $person
     * @return Stock
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
     * @return Stock
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
