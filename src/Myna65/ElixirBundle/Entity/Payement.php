<?php

namespace Myna65\ElixirBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payement
 *
 * @ORM\Table(name="payement", indexes={@ORM\Index(name="fk_document_has_journal_journal1_idx", columns={"journal_id"}), @ORM\Index(name="fk_document_has_journal_document1_idx", columns={"Document_id"})})
 * @ORM\Entity
 */
class Payement
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
     * @ORM\Column(name="value", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $value;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var \Document
     *
     * @ORM\ManyToOne(targetEntity="Document")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Document_id", referencedColumnName="id")
     * })
     */
    private $document;

    /**
     * @var \Journal
     *
     * @ORM\ManyToOne(targetEntity="Journal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="journal_id", referencedColumnName="id")
     * })
     */
    private $journal;



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
     * Set value
     *
     * @param string $value
     * @return Payement
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Payement
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Payement
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set document
     *
     * @param \Myna65\ElixirBundle\Entity\Document $document
     * @return Payement
     */
    public function setDocument(\Myna65\ElixirBundle\Entity\Document $document = null)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return \Myna65\ElixirBundle\Entity\Document 
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set journal
     *
     * @param \Myna65\ElixirBundle\Entity\Journal $journal
     * @return Payement
     */
    public function setJournal(\Myna65\ElixirBundle\Entity\Journal $journal = null)
    {
        $this->journal = $journal;

        return $this;
    }

    /**
     * Get journal
     *
     * @return \Myna65\ElixirBundle\Entity\Journal 
     */
    public function getJournal()
    {
        return $this->journal;
    }
}
