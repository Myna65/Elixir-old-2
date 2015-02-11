<?php

namespace Myna65\ElixirBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="fk_product_product_category1_idx", columns={"category_id"}), @ORM\Index(name="fk_product_person1_idx", columns={"provider_id"}), @ORM\Index(name="fk_product_collection1_idx", columns={"collection_id"})})
 * @ORM\Entity
 */
class Product
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
     * @ORM\Column(name="model", type="string", length=45, nullable=false)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="article", type="string", length=45, nullable=false)
     */
    private $article;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", length=45, nullable=false)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=45, nullable=false)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="sell_price", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $sellPrice;

    /**
     * @var \ProductCategory
     *
     * @ORM\ManyToOne(targetEntity="ProductCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var \Person
     *
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provider_id", referencedColumnName="id")
     * })
     */
    private $provider;

    /**
     * @var \Collection
     *
     * @ORM\ManyToOne(targetEntity="Collection")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collection_id", referencedColumnName="id")
     * })
     */
    private $collection;



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
     * Set model
     *
     * @param string $model
     * @return Product
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set article
     *
     * @param string $article
     * @return Product
     */
    public function setArticle($article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return string 
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return Product
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Product
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set sellPrice
     *
     * @param string $sellPrice
     * @return Product
     */
    public function setSellPrice($sellPrice)
    {
        $this->sellPrice = $sellPrice;

        return $this;
    }

    /**
     * Get sellPrice
     *
     * @return string 
     */
    public function getSellPrice()
    {
        return $this->sellPrice;
    }

    /**
     * Set category
     *
     * @param \Myna65\ElixirBundle\Entity\ProductCategory $category
     * @return Product
     */
    public function setCategory(\Myna65\ElixirBundle\Entity\ProductCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Myna65\ElixirBundle\Entity\ProductCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set provider
     *
     * @param \Myna65\ElixirBundle\Entity\Person $provider
     * @return Product
     */
    public function setProvider(\Myna65\ElixirBundle\Entity\Person $provider = null)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * Get provider
     *
     * @return \Myna65\ElixirBundle\Entity\Person 
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set collection
     *
     * @param \Myna65\ElixirBundle\Entity\Collection $collection
     * @return Product
     */
    public function setCollection(\Myna65\ElixirBundle\Entity\Collection $collection = null)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Get collection
     *
     * @return \Myna65\ElixirBundle\Entity\Collection 
     */
    public function getCollection()
    {
        return $this->collection;
    }
}
