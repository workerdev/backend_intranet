<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Enlaces
 * @ORM\Table(name="cb_cfg_enlaces_externos", uniqueConstraints={@ORM\UniqueConstraint(name="cb_enlaces_externos_id", columns={"cb_enlaces_externos_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\EnlacesRepository")
 */
class Enlaces
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_enlaces_externos_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_enlaces_externos_nombre", type="string", length=50, nullable=false)
     */
    private $nombre;
    /**
     * @var string
     *
     * @ORM\Column(name="cb_enlaces_externos_descripcion", type="string", length=50, nullable=false)
     */
    private $descripcion;

    
      /**
     * @var string
     *
     * @ORM\Column(name="cb_enlaces_externos_ruta", type="string", length=255, nullable=false)
     */
    private $ruta;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_enlaces_externos_link", type="string", length=150, nullable=false)
     */
    private $link;
    

    /**
     * @var int
     *
     * @ORM\Column(name="cb_enlaces_externos_estado", type="integer", nullable=false)
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
    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

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
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    } 
    public function getRuta()
    {
        return $this->ruta;
    }

    public function setRuta($ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }
}
