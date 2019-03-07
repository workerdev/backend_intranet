<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

/**
 * CROSeguimiento
 * @ORM\Table(name="cb_proc_croseguimiento", uniqueConstraints={@ORM\UniqueConstraint(name="cb_croseguimiento_id", columns={"cb_croseguimiento_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\CROSeguimientoRepository")
 */
class CROSeguimiento
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_croseguimiento_id", type="integer", nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \riesgos
     *
     * @ORM\ManyToOne(targetEntity="RiesgosOportunidades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_croseguimiento_fkriesgos", referencedColumnName="cb_riesgos_oportunidades_id")
     * })
     */
    private $fkriesgos;

    /**
     * @var date
     *
     * @ORM\Column(name="cb_croseguimiento_fecha_seg", type="date", nullable=true)
     */
    private $fecha_seg;

     /**
     * @var string
     *
     * @ORM\Column(name="cb_croseguimiento_responsable", type="string", length=60, nullable=false)
     */
    private $responsable;

    /**
    * @var string
    *
    * @ORM\Column(name="cb_croseguimiento_observaciones", type="string", length=300, nullable=false)
    */
    private $observaciones;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_croseguimiento_estado", type="integer", nullable=false)
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

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

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
    
    public function getFechaSeg(): ?\DateTimeInterface
    {
        return $this->fecha_seg;
    }

    public function setFechaSeg(\DateTimeInterface $fecha_seg): self
    {
        $this->fecha_seg = $fecha_seg;
        return $this;
    }

    public function getFkriesgos(): ?RiesgosOportunidades
    {
        return $this->fkriesgos;
    }

    public function setFkriesgos(?RiesgosOportunidades $fkriesgos): self
    {
        $this->fkriesgos = $fkriesgos;

        return $this;
    }
}