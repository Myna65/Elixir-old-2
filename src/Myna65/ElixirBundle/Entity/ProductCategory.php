<?php

namespace Myna65\ElixirBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductCategory
 *
 * @ORM\Table(name="product_category", indexes={@ORM\Index(name="fk_product_category_product_category1_idx", columns={"parent_id"})})
 * @ORM\Entity
 */
class ProductCategory
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
     * @ORM\Column(name="value", type="string", length=45, nullable=false)
     */
    private $value;

    /**
     * @var \ProductCategory
     *
     * @ORM\ManyToOne(targetEntity="ProductCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;



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
     * @return ProductCategory
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
     * Set parent
     *
     * @param \Myna65\ElixirBundle\Entity\ProductCategory $parent
     * @return ProductCategory
     */
    public function setParent(\Myna65\ElixirBundle\Entity\ProductCategory $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Myna65\ElixirBundle\Entity\ProductCategory 
     */
    public function getParent()
    {
        return $this->parent;
    }
}
