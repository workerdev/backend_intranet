<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * ControlCorrelativo
 * @ORM\Table(name="cb_control_correlativo", indexes={@ORM\Index(name="cb_control_correlativo_id", columns={"cb_control_correlativo_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\ControlCorrelativoRepository")
 *  @UniqueEntity(fields = "id", message="Este valor ya se encuentra registrado")
 */
class ControlCorrelativo
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_control_correlativo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    

    /**
     * @var string
     *
     * @ORM\Column(name="cb_control_correlativo_nombre", type="string", length=100, nullable=false)
     * @Assert\NotBlank
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_control_correlativo_codigo", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $codigo;
    
      /**
     * @var string
     *
     * @ORM\Column(name="cb_control_correlativo_descripcion", type="string", length=100, nullable=false)
       * @Assert\NotBlank
     */
    private $descripcion;
    
    /**
     * @var \gerencia
     *
     * @ORM\ManyToOne(targetEntity="Gerencia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_control_correlativo_fkgerencia", referencedColumnName="cb_gerencia_id")
     * })
     * @Assert\NotBlank
     */
    private $fkgerencia;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_control_correlativo_estado", type="integer", nullable=false)
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

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

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

    public function getFkgerencia(): ?Gerencia
    {
        return $this->fkgerencia;
    }

    public function setFkgerencia(?Gerencia $fkgerencia): self
    {
        $this->fkgerencia = $fkgerencia;

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
