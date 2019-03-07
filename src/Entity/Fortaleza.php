<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Fortaleza
 * @ORM\Table(name="cb_aud_fortaleza", uniqueConstraints={@ORM\UniqueConstraint(name="cb_fortaleza_id", columns={"cb_fortaleza_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\FortalezaRepository")
 */
class Fortaleza
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_fortaleza_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var \auditoria
     *
     * @ORM\ManyToOne(targetEntity="Auditoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_fortaleza_fkauditoria", referencedColumnName="cb_auditoria_id")
     * })
     * @Assert\NotBlank
     */
    private $fkauditoria;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_fortaleza_ordinal", type="integer", nullable=false)
     * @Assert\NotBlank(
     *     message = "Este valor no deberia estar vacio , solo se permiten valores numericos"
     * )
     */
    private $ordinal;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_fortaleza_descripcion", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $descripcion;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_fortaleza_responsable", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $responsable;

    /**
     * @var datetime
     *
     * @ORM\Column(name="cb_fortaleza_fecharegistro", type="date", nullable=true)
     * @Assert\NotBlank
     */
    private $fecharegistro;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_fortaleza_estado", type="integer", nullable=false)
     *
     */
    private $estado;


    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getFkauditoria(): ?Auditoria
    {
        return $this->fkauditoria;
    }

    public function setFkauditoria(?Auditoria $fkauditoria): self
    {
        $this->fkauditoria = $fkauditoria;

        return $this;
    }

    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    public function setOrdinal(int $ordinal): self
    {
        $this->ordinal = $ordinal;

        return $this;
    }
    
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getFecharegistro(): ?\DateTimeInterface
    {
        return $this->fecharegistro;
    }

    public function setFecharegistro(\DateTimeInterface $fecharegistro): self
    {
        $this->fecharegistro = $fecharegistro;

        return $this;
    }

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }
}