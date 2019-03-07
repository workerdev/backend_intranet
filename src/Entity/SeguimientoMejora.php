<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SeguimientoMejora
 * @ORM\Table(name="cb_acciones_seg_mejoras", indexes={@ORM\Index(name="cb_seguimiento_mejoras_id", columns={"cb_seguimiento_mejoras_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\SeguimientoMejoraRepository")
 */
class SeguimientoMejora
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_seguimiento_mejoras_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

     /**
     * @var \mejora
     *
     * @ORM\ManyToOne(targetEntity="RegistroMejora")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_seguimiento_mejoras_fkmejora", referencedColumnName="cb_registro_mejora_id")
     * })
     */
    private $fkmejora;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_seguimiento_mejoras_responsable", type="string", length=100, nullable=false)
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_seguimiento_mejoras_observacion", type="string", length=400, nullable=false)
     */
    private $observacion;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_seguimiento_mejoras_estado", type="integer", nullable=false)
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
    public function getFkmejora(): ?RegistroMejora
    {
        return $this->fkmejora;
    }

    public function setFkmejora(?RegistroMejora $fkmejora): self
    {
        $this->fkmejora = $fkmejora;

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

    public function getObservacion(): ?string
    {
        return $this->observacion;
    }

    public function setObservacion(string $observacion): self
    {
        $this->observacion = $observacion;

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
