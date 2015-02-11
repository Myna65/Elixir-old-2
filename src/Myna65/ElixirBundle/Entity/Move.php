<?php

namespace Myna65\\ElixirBundle\\Entity;

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

}
