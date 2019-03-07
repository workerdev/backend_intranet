<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Impacto
 * @ORM\Table(name="cb_procesos_impacto", uniqueConstraints={@ORM\UniqueConstraint(name="cb_impacto_nombre", columns={"cb_impacto_nombre"})})
 * @ORM\Entity(repositoryClass="App\Repository\ImpactoRepository")
 *  @UniqueEntity(fields = "nombre", message="Este valor ya se encuentra registrado")
 */
class Impacto
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_impacto_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_impacto_nombre", type="string", length=30, nullable=false)
     *@Assert\NotBlank
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_impacto_valor", type="string", length=30, nullable=false)
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="numeric",
     *     message="Solo se admiten valores numericos" )
     */
    private $valor;
    

    /**
     * @var int
     *
     * @ORM\Column(name="cb_impacto_estado", type="integer", nullable=false)
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
    public function getValor(): ?string
    {
        return $this->valor;
    }

    public function setValor(string $valor): self
    {
        $this->valor = $valor;

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
