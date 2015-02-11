<?php

namespace Myna65\ElixirBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zip
 *
 * @ORM\Table(name="zip", indexes={@ORM\Index(name="fk_zip_land1_idx", columns={"land_id"})})
 * @ORM\Entity
 */
class Zip
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
     * @ORM\Column(name="number", type="string", length=45, nullable=false)
     */
    private $number;

    /**
     * @var \Land
     *
     * @ORM\ManyToOne(targetEntity="Land")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="land_id", referencedColumnName="id")
     * })
     */
    private $land;



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
     * Set number
     *
     * @param string $number
     * @return Zip
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set land
     *
     * @param \Myna65\ElixirBundle\Entity\Land $land
     * @return Zip
     */
    public function setLand(\Myna65\ElixirBundle\Entity\Land $land = null)
    {
        $this->land = $land;

        return $this;
    }

    /**
     * Get land
     *
     * @return \Myna65\ElixirBundle\Entity\Land 
     */
    public function getLand()
    {
        return $this->land;
    }
}
