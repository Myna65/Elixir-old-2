<?php

namespace Myna65\ElixirBundle\Entity;

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
     * Set role
     *
     * @param string $role
     * @return Permission
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Add credential
     *
     * @param \Myna65\ElixirBundle\Entity\Credential $credential
     * @return Permission
     */
    public function addCredential(\Myna65\ElixirBundle\Entity\Credential $credential)
    {
        $this->credential[] = $credential;

        return $this;
    }

    /**
     * Remove credential
     *
     * @param \Myna65\ElixirBundle\Entity\Credential $credential
     */
    public function removeCredential(\Myna65\ElixirBundle\Entity\Credential $credential)
    {
        $this->credential->removeElement($credential);
    }

    /**
     * Get credential
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCredential()
    {
        return $this->credential;
    }
}
