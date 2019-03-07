<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Gerencia
 * @ORM\Table(name="cb_configuracion_gerencia", uniqueConstraints={@ORM\UniqueConstraint(name="cb_gerencia_nombre", columns={"cb_gerencia_nombre"})})
 * @ORM\Entity(repositoryClass="App\Repository\GerenciaRepository")
 *  @UniqueEntity(fields = "nombre", message="Este valor ya se encuentra registrado")
 */
class Gerencia
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_gerencia_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_gerencia_nombre", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_gerencia_descripcion", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $descripcion;
    

    /**
     * @var int
     *
     * @ORM\Column(name="cb_gerencia_estado", type="integer", nullable=false)
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
