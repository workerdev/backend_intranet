<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * AccionReprograma
 * @ORM\Table(name="cb_aud_accion_reprograma", indexes={@ORM\Index(name="cb_accion_reprograma_id", columns={"cb_accion_reprograma_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\AccionReprogramaRepository")
 *
 */

class AccionReprograma
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_accion_reprograma_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \accion
     *
     * @ORM\ManyToOne(targetEntity="Accion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_accion_reprograma_fkaccion", referencedColumnName="cb_accion_id")
     * })
     * @Assert\NotBlank
     */
    private $fkaccion;

    /**
     * @var datetime
     *
     * @ORM\Column(name="cb_accion_reprograma_fechaanterior", type="date", nullable=false)
     * @Assert\NotBlank
     */
    private $fechaanterior;

    /**
     * @var datetime
     *
     * @ORM\Column(name="cb_accion_reprograma_fechaimplementacion", type="date", nullable=false)
     * @Assert\NotBlank
     */
    private $fechaimplementacion;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_accion_reprograma_motivojustificacion", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $motivojustificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_accion_reprograma_autoriza", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $autoriza;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_accion_reprograma_responsableregistro", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $responsableregistro;

    /**
     * @var datetime
     *
     * @ORM\Column(name="cb_accion_reprograma_fecharegistro", type="date", nullable=false)
     * @Assert\NotBlank
     */
    private $fecharegistro;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_accion_reprograma_estado", type="integer", nullable=false)
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
    
    public function getFkaccion(): ?Accion
    {
        return $this->fkaccion;
    }

    public function setFkaccion(?Accion $fkaccion): self
    {
        $this->fkaccion = $fkaccion;

        return $this;
    }

    public function getFechaanterior(): ?\DateTimeInterface
    {
        return $this->fechaanterior;
    }

    public function setFechaanterior(\DateTimeInterface $fechaanterior): self
    {
        $this->fechaanterior = $fechaanterior;

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

    public function getMotivojustificacion(): ?string
    {
        return $this->motivojustificacion;
    }

    public function setMotivojustificacion(string $motivojustificacion): self
    {
        $this->motivojustificacion = $motivojustificacion;

        return $this;
    }

    public function getAutoriza(): ?string
    {
        return $this->autoriza;
    }

    public function setAutoriza(string $autoriza): self
    {
        $this->autoriza = $autoriza;

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