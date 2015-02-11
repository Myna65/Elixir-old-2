<?php

namespace Myna65\ElixirRelationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Land
 *
 * @ORM\Table(name="land", uniqueConstraints={@ORM\UniqueConstraint(name="name_UNIQUE", columns={"name"}), @ORM\UniqueConstraint(name="code_UNIQUE", columns={"code"})})
 * @ORM\Entity
 */
class Land
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
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=2, nullable=false)
     */
    private $code;


}
