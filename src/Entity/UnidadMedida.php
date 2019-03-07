<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * UnidadMedida
 * @ORM\Table(name="cb_procesos_unidad_medida", uniqueConstraints={@ORM\UniqueConstraint(name="cb_unidad_medida_nombre", columns={"cb_unidad_medida_nombre"})})
 * @ORM\Entity(repositoryClass="App\Repository\UnidadMedidaRepository")
 * @UniqueEntity(fields = "nombre", message="Este valor ya se encuentra registrado")
 */
class UnidadMedida
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_unidad_medida_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="cb_unidad_medida_nombre", type="string", length=50, nullable=false)
     */
    private $nombre;
    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="cb_unidad_medida_sigla", type="string", length=50, nullable=false)
     */
    private $sigla;

    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="cb_unidad_medida_descripcion", type="string", length=150, nullable=false)
     */
    private $descripcion;
    

    /**
     * @var int
     *
     * @ORM\Column(name="cb_unidad_medida_estado", type="integer", nullable=false)
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
    public function getSigla(): ?string
    {
        return $this->sigla;
    }

    public function setSigla(string $sigla): self
    {
        $this->sigla = $sigla;

        return $this;
    }  
}
