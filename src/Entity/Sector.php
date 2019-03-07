<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Sector
 * @ORM\Table(name="cb_configuracion_sector", indexes={@ORM\Index(name="cb_sector_nombre", columns={"cb_sector_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\SectorRepository")
 * @UniqueEntity(fields = "nombre", message="Este valor ya se encuentra registrado")
 */
class Sector
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_sector_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="cb_sector_nombre", type="text", nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="cb_sector_descripcion", type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_sector_estado", type="integer", nullable=false)
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

 
}
