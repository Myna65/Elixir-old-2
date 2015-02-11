<?php

namespace Myna65\ElixirBundle\Entity;

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
     * Set username
     *
     * @param string $username
     * @return Credential
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Credential
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set person
     *
     * @param \Myna65\ElixirBundle\Entity\Person $person
     * @return Credential
     */
    public function setPerson(\Myna65\ElixirBundle\Entity\Person $person = null)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \Myna65\ElixirBundle\Entity\Person 
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Add permission
     *
     * @param \Myna65\ElixirBundle\Entity\Permission $permission
     * @return Credential
     */
    public function addPermission(\Myna65\ElixirBundle\Entity\Permission $permission)
    {
        $this->permission[] = $permission;

        return $this;
    }

    /**
     * Remove permission
     *
     * @param \Myna65\ElixirBundle\Entity\Permission $permission
     */
    public function removePermission(\Myna65\ElixirBundle\Entity\Permission $permission)
    {
        $this->permission->removeElement($permission);
    }

    /**
     * Get permission
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPermission()
    {
        return $this->permission;
    }
}
