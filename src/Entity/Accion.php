<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Accion
 * @ORM\Table(name="cb_aud_accion", indexes={@ORM\Index(name="cb_accion_id", columns={"cb_accion_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\AccionRepository")
 */

class Accion
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_accion_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \hallazgo
     *
     * @ORM\ManyToOne(targetEntity="Hallazgo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_accion_fkhallazgo", referencedColumnName="cb_hallazgo_id")
     * })
     * @Assert\NotBlank
     */
    private $fkhallazgo;    

    /**
     * @var int
     *
     * @ORM\Column(name="cb_accion_ordinal", type="integer", nullable=false)
     * @Assert\NotBlank(
     *     message = "Este valor no puede estar . solo se aceptan valores numericos"
     * )
     */
    private $ordinal;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_accion_descripcion", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $descripcion;

    /**
     * @var datetime
     *
     * @ORM\Column(name="cb_accion_fechaimplementacion", type="date", nullable=false)
     * @Assert\NotBlank
     */
    private $fechaimplementacion;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_accion_responsableimplementacion", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $responsableimplementacion;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_accion_estadoaccion", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $estadoaccion;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_accion_responsableregistro", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $responsableregistro;

    /**
     * @var datetime
     *
     * @ORM\Column(name="cb_accion_fecharegistro", type="date", nullable=true)
     * @Assert\NotBlank
     */
    private $fecharegistro;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_accion_estado", type="integer", nullable=false)
     *
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
    
    public function getFkhallazgo(): ?Hallazgo
    {
        return $this->fkhallazgo;
    }

    public function setFkhallazgo(?Hallazgo $fkhallazgo): self
    {
        $this->fkhallazgo = $fkhallazgo;

        return $this;
    }

    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    public function setOrdinal(int $ordinal): self
    {
        $this->ordinal = $ordinal;

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

    public function getFechaimplementacion(): ?\DateTimeInterface
    {
        return $this->fechaimplementacion;
    }

    public function setFechaimplementacion(\DateTimeInterface $fechaimplementacion): self
    {
        $this->fechaimplementacion = $fechaimplementacion;

        return $this;
    }

    public function getResponsableimplementacion(): ?string
    {
        return $this->responsableimplementacion;
    }

    public function setResponsableimplementacion(string $responsableimplementacion): self
    {
        $this->responsableimplementacion = $responsableimplementacion;

        return $this;
    }

    public function getEstadoaccion(): ?string
    {
        return $this->estadoaccion;
    }

    public function setEstadoaccion(string $estadoaccion): self
    {
        $this->estadoaccion = $estadoaccion;

        return $this;
    }

    public function getResponsableregistro(): ?string
    {
        return $this->responsableregistro;
    }

    public function setResponsableregistro(string $responsableregistro): self
    {
        $this->responsableregistro = $responsableregistro;

        return $this;
    }

    public function getFecharegistro(): ?\DateTimeInterface
    {
        return $this->fecharegistro;
    }

    public function setFecharegistro(\DateTimeInterface $fecharegistro): self
    {
        $this->fecharegistro = $fecharegistro;

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