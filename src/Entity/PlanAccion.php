<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Gerencia
 * @ORM\Table(name="cb_audi_plan_accion", uniqueConstraints={@ORM\UniqueConstraint(name="cb_plan_accion_titulo", columns={"cb_plan_accion_titulo"})})
 * @ORM\Entity(repositoryClass="App\Repository\PlanAccionRepository")
 * @UniqueEntity(fields = "titulo", message="Este valor ya se encuentra registrado")
 */
class PlanAccion
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_plan_accion_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_plan_accion_titulo", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_plan_accion_motivos", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $motivos;

    /**
     * @var date
     *
     * @ORM\Column(name="cb_plan_accion_fecha", type="date", nullable=false)
     * @Assert\NotBlank
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_plan_accion_responsable", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $responsable;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_plan_accion_estado", type="integer", nullable=false)
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
    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    
    public function getMotivos(): ?string
    {
        return $this->motivos;
    }

    public function setMotivos(string $motivos): self
    {
        $this->motivos = $motivos;

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