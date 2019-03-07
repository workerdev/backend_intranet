<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * AccionEficacia
 * @ORM\Table(name="cb_aud_accion_eficacia", indexes={@ORM\Index(name="cb_accion_eficacia_id", columns={"cb_accion_eficacia_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\AccionEficaciaRepository")
 */

class AccionEficacia
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_accion_eficacia_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \accion
     *
     * @ORM\ManyToOne(targetEntity="Accion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_accion_eficacia_fkaccion", referencedColumnName="cb_accion_id")
     * })
     * @Assert\NotBlank
     */
    private $fkaccion;    

    /**
     * @var string
     *
     * @ORM\Column(name="cb_accion_eficacia_eficaz", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $eficaz;    

    /**
     * @var string
     *
     * @ORM\Column(name="cb_accion_eficacia_resultado", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $resultado;

    /**
     * @var datetime
     *
     * @ORM\Column(name="cb_accion_eficacia_fecha", type="date", nullable=false)
     * @Assert\NotBlank
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_accion_eficacia_responsable", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_accion_eficacia_nombreverificador", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $nombreverificador;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_accion_eficacia_cargoverificador", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $cargoverificador;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_accion_eficacia_estado", type="integer", nullable=false)
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

    public function getEficaz(): ?string
    {
        return $this->eficaz;
    }

    public function setEficaz(string $eficaz): self
    {
        $this->eficaz = $eficaz;

        return $this;
    }

    public function getResultado(): ?string
    {
        return $this->resultado;
    }

    public function setResultado(string $resultado): self
    {
        $this->resultado = $resultado;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getNombreverificador(): ?string
    {
        return $this->nombreverificador;
    }

    public function setNombreverificador(string $nombreverificador): self
    {
        $this->nombreverificador = $nombreverificador;

        return $this;
    }

    public function getCargoverificador(): ?string
    {
        return $this->cargoverificador;
    }

    public function setCargoverificador(string $cargoverificador): self
    {
        $this->cargoverificador = $cargoverificador;

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