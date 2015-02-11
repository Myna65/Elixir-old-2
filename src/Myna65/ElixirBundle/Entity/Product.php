<?php

namespace Myna65\\ElixirBundle\\Entity;

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


}
