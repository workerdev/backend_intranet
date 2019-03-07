<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Files
 * @ORM\Table(name="cb_comunicacion_file", indexes={@ORM\Index(name="cb_file_id", columns={"cb_file_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\FilesRepository")
 */
class Files
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_file_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_file_ruta", type="string", length=150, nullable=false)
     */
    private $ruta;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_file_tipo", type="string", length=50, nullable=false)
     */
    private $tipo;
     /**
     * @var \galeria
     *
     * @ORM\ManyToOne(targetEntity="Galeria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_galeria_fkgaleria", referencedColumnName="cb_galeria_id")
     * })
     */
    private $fkgaleria;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_file_estado", type="integer", nullable=false)
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
    public function getRuta()
    {
        return $this->ruta;
    }

    public function setRuta($ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

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

    public function getFkgaleria(): ?Galeria
    {
        return $this->fkgaleria;
    }

    public function setFkgaleria(?Galeria $fkgaleria): self
    {
        $this->fkgaleria = $fkgaleria;

        return $this;
    }
}
