<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * GrupoCorreo
 * @ORM\Table(name="cb_doc_grupocorreo", uniqueConstraints={@ORM\UniqueConstraint(name="cb_grupocorreo_id", columns={"cb_grupocorreo_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\GrupoCorreoRepository")
 */
class GrupoCorreo
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_grupocorreo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_grupocorreo_nombre", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_grupocorreo_correo", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $correo;
    
    /**
     * @var int
     *
     * @ORM\Column(name="cb_grupocorreo_estado", type="integer", nullable=false)
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    } 

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

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