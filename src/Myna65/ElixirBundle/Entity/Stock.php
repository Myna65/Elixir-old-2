<?php

namespace Myna65\ElixirRelationsBundle\Entity;

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

}
