<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Galeria
 * @ORM\Table(name="cb_comunicacion_galeria", indexes={@ORM\Index(name="cb_galeria_id", columns={"cb_galeria_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\GaleriaRepository")
 */
class Galeria
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_galeria_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_galeria_nombre", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_galeria_descripcion", type="string", length=150, nullable=false)
     * @Assert\NotBlank
     */
    private $descripcion;

     /**
     * @var string
     *
     * @ORM\Column(name="cb_galeria_ruta", type="string", length=150, nullable=false)
      *
     */
    private $ruta;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_galeria_estado", type="integer", nullable=false)
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

    public function getRuta(): ?string
    {
        return $this->ruta;
    }

    public function setRuta(string $ruta): self
    {
        $this->ruta = $ruta;

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
