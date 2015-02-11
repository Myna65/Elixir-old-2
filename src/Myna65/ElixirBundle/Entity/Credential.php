<?php

namespace Myna65\ElixirRelationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Credential
 *
 * @ORM\Table(name="credential", uniqueConstraints={@ORM\UniqueConstraint(name="username_UNIQUE", columns={"username"}), @ORM\UniqueConstraint(name="person_id_UNIQUE", columns={"person_id"})})
 * @ORM\Entity
 */
class Credential
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
     * @ORM\Column(name="username", type="string", length=10, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=40, nullable=false)
     */
    private $password;

    /**
     * @var \Person
     *
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     * })
     */
    private $person;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Permission", inversedBy="credential")
     * @ORM\JoinTable(name="user_permission",
     *   joinColumns={
     *     @ORM\JoinColumn(name="credential_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="permission_id", referencedColumnName="id")
     *   }
     * )
     */
    private $permission;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->permission = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
