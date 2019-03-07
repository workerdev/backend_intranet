<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * DocTipoExtra
 * @ORM\Table(name="cb_gestion_doctipoextra", uniqueConstraints={@ORM\UniqueConstraint(name="cb_doc_tipoextra_id", columns={"cb_doc_tipoextra_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\DocTipoExtraRepository")
 *
 */
class DocTipoExtra
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_doc_tipoextra_id", type="integer", nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="cb_doc_tipoextra_tipo", type="text", nullable=false)
     */
    private $tipo;
     /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="cb_doc_tipoextra_descripcion", type="text", nullable=false)
     */
    private $descripcion;
    
    /**
     * @var int
     *
     * @ORM\Column(name="cb_doc_tipoextra_estado", type="integer", nullable=false)
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
    
    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

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