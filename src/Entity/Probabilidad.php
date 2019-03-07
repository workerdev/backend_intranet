<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Probabilidad
 * @ORM\Table(name="cb_prob_ocurrencia", uniqueConstraints={@ORM\UniqueConstraint(name="cb_probabilidad_ocurrencia_nombre", columns={"cb_probabilidad_ocurrencia_nombre"})})
 * @ORM\Entity(repositoryClass="App\Repository\ProbabilidadRepository")
 * @UniqueEntity(fields = "nombre", message="Este valor ya se encuentra registrado")
 */
class Probabilidad
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_probabilidad_ocurrencia_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     */
    private $id;

    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="cb_probabilidad_ocurrencia_nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="cb_probabilidad_ocurrencia_descripcion", type="string", length=100, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *@Assert\NotBlank
     *@Assert\Type(
     *     type="string",
     *     message="El valor tiene que ser numerico.")
     * @ORM\Column(name="cb_probabilidad_ocurrencia_valor", type="string", length=30, nullable=false)
     */
    private $valor;
    

    /**
     * @var int
     *
     * @ORM\Column(name="cb_probabilidad_ocurrencia_estado", type="integer", nullable=false)
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

    public function getValor(): ?string
    {
        return $this->valor;
    }

    public function setValor(string $valor): self
    {
        $this->valor = $valor;

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
