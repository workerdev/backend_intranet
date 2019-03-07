<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * SeguimientoPlan
 * @ORM\Table(name="cb_audi_seguimiento_plan", indexes={@ORM\Index(name="cb_seguimiento_plan_id", columns={"cb_seguimiento_plan_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\SeguimientoPlanRepository")
 */
class SeguimientoPlan
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_seguimiento_plan_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var \plan
     *
     * @ORM\ManyToOne(targetEntity="PlanAccion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_seguimiento_plan_fkplan", referencedColumnName="cb_plan_accion_id")
     * })
     * @Assert\NotBlank
     */
    private $fkplan;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_seguimiento_plan_responsable", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $responsable;

    /**
     * @var date
     *
     * @ORM\Column(name="cb_seguimiento_plan_fecha", type="date", nullable=false)
     * @Assert\NotBlank
     */
    private $fecha;

    /**
     * @var \estado
     *
     * @ORM\ManyToOne(targetEntity="EstadoPlan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_seguimiento_plan_fkestado", referencedColumnName="cb_estado_plan_id")
     * })
     * @Assert\NotBlank
     */
    private $fkestado;
    
      /**
     * @var string
     *
     * @ORM\Column(name="cb_seguimiento_plan_observaciones", type="text", nullable=false)
       * @Assert\NotBlank
     */
    private $observaciones;

    /**
     * @var date
     *
     * @ORM\Column(name="cb_seguimiento_plan_fechaimplementacion", type="date", nullable=false)
     * @Assert\NotBlank
     */
    private $fechaimplementacion;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_seguimiento_plan_estado", type="integer", nullable=false)
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
    public function getFkplan(): ?PlanAccion
    {
        return $this->fkplan;
    }

    public function setFkplan(?PlanAccion $fkplan): self
    {
        $this->fkplan = $fkplan;

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

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }
    public function getFkestado(): ?EstadoPlan
    {
        return $this->fkestado;
    }

    public function setFkestado(?EstadoPlan $fkestado): self
    {
        $this->fkestado = $fkestado;

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

    public function getFechaimplementacion(): ?\DateTimeInterface
    {
        return $this->fechaimplementacion;
    }

    public function setFechaimplementacion(\DateTimeInterface $fechaimplementacion): self
    {
        $this->fechaimplementacion = $fechaimplementacion;

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
