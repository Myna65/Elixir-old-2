<?php

namespace Myna65\\ElixirBundle\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 *
 * @ORM\Table(name="city", indexes={@ORM\Index(name="fk_city_zip1_idx", columns={"zip_id"})})
 * @ORM\Entity
 */
class City
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
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var \Zip
     *
     * @ORM\ManyToOne(targetEntity="Zip")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="zip_id", referencedColumnName="id")
     * })
     */
    private $zip;


}
