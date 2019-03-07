<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * AccionSeguimiento
 * @ORM\Table(name="cb_aud_accion_seguimiento", indexes={@ORM\Index(name="cb_accion_seguimiento_id", columns={"cb_accion_seguimiento_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\AccionSeguimientoRepository")
 */

class AccionSeguimiento
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_accion_seguimiento_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \accion
     *
     * @ORM\ManyToOne(targetEntity="Accion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_accion_seguimiento_fkaccion", referencedColumnName="cb_accion_id")
     * })
     * @Assert\NotBlank
     */
    private $fkaccion;    

    /**
     * @var int
     *
     * @ORM\Column(name="cb_accion_seguimiento_ordinal", type="integer", nullable=false)
     * @Assert\NotBlank(
     *     message= "Este valor no debe estar vacio, solo se acepta valores numericos"
     * )
     */
    private $ordinal;

    /**
     * @var datetime
     *
     * @ORM\Column(name="cb_accion_seguimiento_fecha", type="date", nullable=false)
     * @Assert\NotBlank
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_accion_seguimiento_responsable", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_accion_seguimiento_observaciones", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $observaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_accion_seguimiento_estadoseguimiento", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $estadoseguimiento;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_accion_seguimiento_estado", type="integer", nullable=false)
     */
    private $estado;


    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }
    
    public function getFkaccion(): ?Accion
    {
        return $this->fkaccion;
    }

    public function setFkaccion(?Accion $fkaccion): self
    {
        $this->fkaccion = $fkaccion;

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

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

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

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(string $observaciones): self
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    public function getEstadoseguimiento(): ?string
    {
        return $this->estadoseguimiento;
    }

    public function setEstadoseguimiento(string $estadoseguimiento): self
    {
        $this->estadoseguimiento = $estadoseguimiento;

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