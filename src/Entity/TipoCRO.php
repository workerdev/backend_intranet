<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * TipoCRO
 * @ORM\Table(name="cb_procesos_tipocro", uniqueConstraints={@ORM\UniqueConstraint(name="cb_tipocro_id", columns={"cb_tipocro_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\TipoCRORepository")
 */
class TipoCRO
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_tipocro_id", type="integer", nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="cb_tipocro_nombre", type="string", length=80, nullable=false)
     */
    private $nombre;
     /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="cb_tipocro_descripcion", type="string", length=60, nullable=false)
     */
    private $descripcion;
    
    /**
     * @var int
     *
     * @ORM\Column(name="cb_tipocro_estado", type="integer", nullable=false)
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
}