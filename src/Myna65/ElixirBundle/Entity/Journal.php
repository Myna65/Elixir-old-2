<?php

namespace Myna65\ElixirRelationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Journal
 *
 * @ORM\Table(name="journal")
 * @ORM\Entity
 */
class Journal
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
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="current_amount", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $currentAmount;


}
