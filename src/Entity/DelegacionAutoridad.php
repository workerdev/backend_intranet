<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DelegacionAutoridad
 * @ORM\Table(name="cb_cfg_delautoridad", indexes={@ORM\Index(name="cb_delautoridad_id", columns={"cb_delautoridad_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\DelegacionAutoridadRepository")
 */
class DelegacionAutoridad
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_delautoridad_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_delautoridad_nombre", type="text", nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_delautoridad_cargo", type="text", nullable=false)
     */
    private $cargo;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_delautoridad_foto", type="text", nullable=false)
     */
    private $foto;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_delautoridad_archivo", type="text", nullable=false)
     */
    private $archivo;
     
    /**
     * @var int
     *
     * @ORM\Column(name="cb_delautoridad_estado", type="integer", nullable=false)
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

    public function getCargo(): ?string
    {
        return $this->cargo;
    }

    public function setCargo(string $cargo): self
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }  

    public function getArchivo()
    {
        return $this->archivo;
    }

    public function setArchivo($archivo)
    {
        $this->archivo = $archivo;

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