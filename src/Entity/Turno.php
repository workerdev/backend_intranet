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
     * @ORM\Column(name="cb_turno_nombre", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_turno_descripcion", type="string", length=150, nullable=false)
     *
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_turno_estado", type="integer", nullable=false)
     */
    private $estado;

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

   


    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;
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

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

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
}
