<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AuditoriaTipo
 * @ORM\Table(name="cb_aud_auditoriatipo", uniqueConstraints={@ORM\UniqueConstraint(name="cb_auditoriatipo_id", columns={"cb_auditoriatipo_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\AuditoriaTipoRepository")
 */
class AuditoriaTipo
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_auditoriatipo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_auditoriatipo_nombre", type="text", nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_auditoriatipo_descripcion", type="text", nullable=false)
     */
    private $descripcion;
    

    /**
     * @var int
     *
     * @ORM\Column(name="cb_auditoriatipo_estado", type="integer", nullable=false)
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
    
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }  
}
