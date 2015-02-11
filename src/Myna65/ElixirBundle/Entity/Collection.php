<?php

namespace Myna65\\ElixirBundle\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Collection
 *
 * @ORM\Table(name="collection")
 * @ORM\Entity
 */
class Collection
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
     * @var integer
     *
     * @ORM\Column(name="year", type="smallint", nullable=false)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="season", type="string", nullable=false)
     */
    private $season;


}
