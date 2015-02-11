<?php

namespace Myna65\ElixirRelationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Permission
 *
 * @ORM\Table(name="permission", uniqueConstraints={@ORM\UniqueConstraint(name="role_UNIQUE", columns={"role"})})
 * @ORM\Entity
 */
class Permission
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
     * @ORM\Column(name="role", type="string", length=45, nullable=false)
     */
    private $role;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Credential", mappedBy="permission")
     */
    private $credential;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->credential = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
