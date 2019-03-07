<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * FichaCargo
 * @ORM\Table(name="cb_fc_ficha_cargo", indexes={@ORM\Index(name="cb_ficha_cargo_nombre", columns={"cb_ficha_cargo_nombre"})})
 * @ORM\Entity(repositoryClass="App\Repository\FichaCargoRepository")
 *  @UniqueEntity(fields = "nombre", message="Este valor ya se encuentra registrado")
 */
class FichaCargo
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_ficha_cargo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var \area
     *
     * @ORM\ManyToOne(targetEntity="GerenciaAreaSector")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_ficha_cargo_fkarea", referencedColumnName="cb_gas_id")
     * })
      * @Assert\NotBlank
     */
    private $fkarea;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_ficha_cargo_nombre", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $nombre;

     /**
     * @var string
     *
     * @ORM\Column(name="cb_ficha_cargo_objetivo", type="text", nullable=false)
      * @Assert\NotBlank
     */
    private $objetivo;
     /**
     * @var string
     *
     * @ORM\Column(name="cb_ficha_cargo_responsabilidades", type="text", nullable=false)
      * @Assert\NotBlank
     */
    private $responsabilidades;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_ficha_cargo_experiencia", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $experiencia;
    /**
     * @var string
     *
     * @ORM\Column(name="cb_ficha_cargo_conocimientos", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $conocimientos;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_ficha_cargo_formacion", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $formacion;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_ficha_cargo_caracteristicas", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $caracteristicas;

    /**
     * @var date
     *
     * @ORM\Column(name="cb_ficha_cargo_fechaaprobacion", type="date", nullable=true)
     *
     */
    private $fechaaprobacion;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_ficha_cargo_aprobadojefe", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $aprobadojefe;
    /**
     * @var string
     *
     * @ORM\Column(name="cb_ficha_cargo_firmajefe", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $firmajefe;

     /**
     * @var string
     *
     * @ORM\Column(name="cb_ficha_cargo_aprobadogerente", type="text", nullable=false)
      * @Assert\NotBlank
     */
    private $aprobadogerente;
    /**
     * @var string
     *
     * @ORM\Column(name="cb_ficha_cargo_firmagerente", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $firmagerente;
    /**
     * @var string
     *
     * @ORM\Column(name="cb_ficha_cargo_hipervinculo", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $hipervinculo;
    
    /**
     * @var int
     *
     * @ORM\Column(name="cb_ficha_cargo_estado", type="integer", nullable=false)
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

    public function getFkarea(): ?GerenciaAreaSector
    {
        return $this->fkarea;
    }

    public function setFkarea(?GerenciaAreaSector $fkarea): self
    {
        $this->fkarea = $fkarea;

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
    public function getObjetivo(): ?string
    {
        return $this->objetivo;
    }

    public function setObjetivo(string $objetivo): self
    {
        $this->objetivo = $objetivo;

        return $this;
    }

    public function getResponsabilidades(): ?string
    {
        return $this->responsabilidades;
    }

    public function setResponsabilidades(string $responsabilidades): self
    {
        $this->responsabilidades = $responsabilidades;

        return $this;
    }

    public function getExperiencia(): ?string
    {
        return $this->experiencia;
    }

    public function setExperiencia(string $experiencia): self
    {
        $this->experiencia = $experiencia;

        return $this;
    }
    public function getConocimientos(): ?string
    {
        return $this->conocimientos;
    }

    public function setConocimientos(string $conocimientos): self
    {
        $this->conocimientos = $conocimientos;

        return $this;
    }

    public function getFormacion(): ?string
    {
        return $this->formacion;
    }

    public function setFormacion(string $formacion): self
    {
        $this->formacion = $formacion;

        return $this;
    } 
  public function getCaracteristicas(): ?string
    {
        return $this->caracteristicas;
    }

    public function setCaracteristicas(string $caracteristicas): self
    {
        $this->caracteristicas = $caracteristicas;

        return $this;
    }
    
    public function getFechaaprobacion(): ?\DateTimeInterface
    {
        return $this->fechaaprobacion;
    }

    public function setFechaaprobacion(\DateTimeInterface $fechaaprobacion): self
    {
        $this->fechaaprobacion = $fechaaprobacion;
        return $this;
    } 

    public function getAprobadojefe(): ?string
    {
        return $this->aprobadojefe;
    }

    public function setAprobadojefe(string $aprobadojefe): self
    {
        $this->aprobadojefe = $aprobadojefe;

        return $this;
    }
    
    public function getFirmajefe(): ?string
    {
        return $this->firmajefe;
    }

    public function setFirmajefe(string $firmajefe): self
    {
        $this->firmajefe = $firmajefe;

        return $this;
    }

    
    public function getAprobadogerente(): ?string
    {
        return $this->aprobadogerente;
    }

    public function setAprobadogerente(string $aprobadogerente): self
    {
        $this->aprobadogerente = $aprobadogerente;

        return $this;
    }
    
    public function getFirmagerente(): ?string
    {
        return $this->firmagerente;
    }

    public function setFirmagerente(string $firmagerente): self
    {
        $this->firmagerente = $firmagerente;

        return $this;
    }

        
    public function getHipervinculo(): ?string
    {
        return $this->hipervinculo;
    }

    public function setHipervinculo(string $hipervinculo): self
    {
        $this->hipervinculo = $hipervinculo;

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
