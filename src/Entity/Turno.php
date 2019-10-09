<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Turno
 * @ORM\Table(name="cb_personal_turno", indexes={@ORM\Index(name="cb_turno_fkpersonal", columns={"cb_turno_fkpersonal"})})
 * @ORM\Entity(repositoryClass="App\Repository\TurnoRepository")
 */
class Turno
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_turno_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_turno_telefono", type="string", length=20, nullable=false)
     * @Assert\NotBlank
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_turno_celular", type="string", length=20, nullable=false)
     *
     */
    private $celular;

    /**
     * @var date
     *
     * @ORM\Column(name="cb_turno_fecha_inicio", type="date", nullable=false)
     */
    private $fechainicio;
    
    /**
     * @var date
     *
     * @ORM\Column(name="cb_turno_fecha_fin", type="date", nullable=true)
     */
    private $fechafin;

    /**
     * @var \tipo
     *
     * @ORM\ManyToOne(targetEntity="TipoTurno")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="cb_turno_fktipo", referencedColumnName="cb_tipo_turno_id")
     * })
     * @Assert\NotBlank
     */
    private $fktipo;

    /**
     * @var \personal
     *
     * @ORM\ManyToOne(targetEntity="Personal")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="cb_turno_fkpersonal", referencedColumnName="cb_personal_id")
     * })
     * @Assert\NotBlank
     */
    private $fkpersonal;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_turno_estado", type="integer", nullable=false)
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
    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;
        return $this;
    }

    public function getCelular(): ?string
    {
        return $this->celular;
    }

    public function setCelular(string $celular): self
    {
        $this->celular = $celular;

        return $this;
    }

    public function getFechainicio(): ?\DateTimeInterface
    {
        return $this->fechainicio;
    }

    public function setFechainicio(\DateTimeInterface $fechainicio): self
    {
        $this->fechainicio = $fechainicio;

        return $this;
    }

    public function getFechafin(): ?\DateTimeInterface
    {
        return $this->fechafin;
    }

    public function setFechafin(\DateTimeInterface $fechafin): self
    {
        $this->fechafin = $fechafin;
        return $this;
    }

    public function getFktipo(): ?TipoTurno
    {
        return $this->fktipo;
    }

    public function setFktipo(?TipoTurno $fktipo): self
    {
        $this->fktipo = $fktipo;

        return $this;
    }

    public function getFkpersonal(): ?Personal
    {
        return $this->fkpersonal;
    }

    public function setFkpersonal(?Personal $fkpersonal): self
    {
        $this->fkpersonal = $fkpersonal;

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