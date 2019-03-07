<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Accidentes
 * @ORM\Table(name="cb_configuracion_accidentes", uniqueConstraints={@ORM\UniqueConstraint(name="cb_accidentes_id", columns={"cb_accidentes_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\AccidentesRepository")
 */
class Accidentes
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_accidentes_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var date
     *
     * @ORM\Column(name="cb_accidentes_fecha_inicio", type="date", nullable=false)
     */
    private $fechaInicio;
    /**
     * @var date
     *
     * @ORM\Column(name="cb_accidentes_fecha_fin", type="date", nullable=true)
     */
    private $fechaFin;

    /**
     * @var string*
     * @ORM\Column(name="cb_accidentes_tipo", type="string", length=50, nullable=true)
     */
    private $tipo;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_accidentes_estado", type="integer", nullable=false)
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

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->fechaInicio;
    }

    public function setFechaInicio(\DateTimeInterface $fechaInicio): self
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }
    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->fechaFin;
    }

    public function setFechaFin(\DateTimeInterface $fechaFin): self
    {
        $this->fechaFin = $fechaFin;
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

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }


}
