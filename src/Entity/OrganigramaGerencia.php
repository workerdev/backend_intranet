<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * OrganigramaGerencia
 * @ORM\Table(name="cb_consulta_organigramagerencia", indexes={@ORM\Index(name="cb_organigramagerencia_id", columns={"cb_organigramagerencia_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\OrganigramaGerenciaRepository")
 */
class OrganigramaGerencia
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_organigramagerencia_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_organigramagerencia_ruta", type="string", length=150, nullable=false)
     */
    private $ruta;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_organigramagerencia_nombre", type="text", nullable=false)
     */
    private $nombre;
     
    /**
     * @var int
     *
     * @ORM\Column(name="cb_organigramagerencia_estado", type="integer", nullable=false)
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

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
