<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * TipoNorma
 * @ORM\Table(name="cb_gestion_tipo_norma", uniqueConstraints={@ORM\UniqueConstraint(name="cb_tipo_norma_nombre", columns={"cb_tipo_norma_nombre"})})
 * @ORM\Entity(repositoryClass="App\Repository\TipoNormaRepository")
 * @UniqueEntity(fields = "nombre", message="Este valor ya se encuentra registrado")
 */
class TipoNorma
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_tipo_norma_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_tipo_norma_nombre", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_tipo_norma_descripcion", type="string", length=150, nullable=false)
     * @Assert\NotBlank
     */
    private $descripcion;
    

    /**
     * @var int
     *
     * @ORM\Column(name="cb_tipo_norma_estado", type="integer", nullable=false)
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
