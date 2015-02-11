<?php

namespace Myna65\\ElixirBundle\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voucher
 *
 * @ORM\Table(name="voucher", uniqueConstraints={@ORM\UniqueConstraint(name="number_UNIQUE", columns={"number"})}, indexes={@ORM\Index(name="fk_voucher_document1_idx", columns={"ticket_intro_id"}), @ORM\Index(name="fk_voucher_document2_idx", columns={"ticket_out_id"})})
 * @ORM\Entity
 */
class Voucher
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
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $amount;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
    private $number;

    /**
     * @var \Document
     *
     * @ORM\ManyToOne(targetEntity="Document")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ticket_intro_id", referencedColumnName="id")
     * })
     */
    private $ticketIntro;

    /**
     * @var \Document
     *
     * @ORM\ManyToOne(targetEntity="Document")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ticket_out_id", referencedColumnName="id")
     * })
     */
    private $ticketOut;


}
