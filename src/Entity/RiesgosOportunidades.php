<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * RiesgosOportunidades
 * @ORM\Table(name="cb_proc_crom", indexes={@ORM\Index(name="cb_riesgos_oportunidades_id", columns={"cb_riesgos_oportunidades_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\RiesgosOportunidadesRepository")
 */
class RiesgosOportunidades
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_riesgos_oportunidades_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \tipo
     *
     * @ORM\ManyToOne(targetEntity="TipoCRO")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_riesgos_oportunidades_fktipo", referencedColumnName="cb_tipocro_id")
     * })
     * @Assert\NotBlank
     */
    private $fktipo;

    /**
     * @var \ficha
     *
     * @ORM\ManyToOne(targetEntity="FichaProcesos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_riesgos_oportunidades_fkficha", referencedColumnName="cb_ficha_procesos_id")
     * })
     * @Assert\NotBlank
     */
    private $fkficha;

     /**
     * @var string
     *
     * @ORM\Column(name="cb_riesgos_oportunidades_descripcion", type="text", nullable=false)
      * @Assert\NotBlank
     */
    private $descripcion;


    /**
     * @var string
     *
     * @ORM\Column(name="cb_riesgos_oportunidades_origen", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $origen;

    /**
     * @var \probabilidad
     *
     * @ORM\ManyToOne(targetEntity="Probabilidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_riesgos_oportunidades_fkprobabilidad", referencedColumnName="cb_probabilidad_ocurrencia_id")
     * })
     * @Assert\NotBlank
     */
    private $fkprobabilidad;

    /**
     * @var \impacto
     *
     * @ORM\ManyToOne(targetEntity="Impacto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_riesgos_oportunidades_fkimpacto", referencedColumnName="cb_impacto_id")
     * })
     * @Assert\NotBlank
     */
    private $fkimpacto;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_riesgos_oportunidades_accion", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $accion;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_riesgos_oportunidades_analisiscausaraiz", type="text", nullable=true)
     * @Assert\NotBlank
     */
    private $analisiscausaraiz;

    /**
     * @var date
     *
     * @ORM\Column(name="cb_riesgos_oportunidades_fecha", type="date", nullable=false)
     * @Assert\NotBlank
     */
    private $fecha;

 /**
     * @var \responsable
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_riesgos_oportunidades_fkresponsable", referencedColumnName="cb_usuario_id")
     * })
     * @Assert\NotBlank
     */
    private $fkresponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_riesgos_oportunidades_estadocro", type="string", length=500, nullable=false)
     * @Assert\NotBlank
     */
    private $estadocro;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_riesgos_oportunidades_estado", type="integer", nullable=false)
     *
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

    public function getFkficha(): ?FichaProcesos
    {
        return $this->fkficha;
    }

    public function setFkficha(?FichaProcesos $fkficha): self
    {
        $this->fkficha = $fkficha;

        return $this;
    }
    
    public function getFktipo(): ?TipoCRO
    {
        return $this->fktipo;
    }

    public function setFktipo(?TipoCRO $fktipo): self
    {
        $this->fktipo = $fktipo;

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

    public function getOrigen(): ?string
    {
        return $this->origen;
    }

    public function setOrigen(string $origen): self
    {
        $this->origen = $origen;

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

 
    public function getFkresponsable(): ?Usuario
    {
        return $this->fkresponsable;
    }
    public function setFkresponsable(?Usuario $fkresponsable): self
    {
        $this->fkresponsable = $fkresponsable;

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

    public function getFkprobabilidad(): ?Probabilidad
    {
        return $this->fkprobabilidad;
    }

    public function setFkprobabilidad(?Probabilidad $fkprobabilidad): self
    {
        $this->fkprobabilidad = $fkprobabilidad;

        return $this;
    }

    public function getFkimpacto(): ?Impacto
    {
        return $this->fkimpacto;
    }

    public function setFkimpacto(?Impacto $fkimpacto): self
    {
        $this->fkimpacto = $fkimpacto;

        return $this;
    }

    public function getAccion(): ?string
    {
        return $this->accion;
    }

    public function setAccion(string $accion): self
    {
        $this->accion = $accion;

        return $this;
    }

    public function getAnalisiscausaraiz(): ?string
    {
        return $this->analisiscausaraiz;
    }

    public function setAnalisiscausaraiz(string $analisiscausaraiz): self
    {
        $this->analisiscausaraiz = $analisiscausaraiz;

        return $this;
    }

    public function getEstadocro(): ?string
    {
        return $this->estadocro;
    }

    public function setEstadocro(string $estadocro): self
    {
        $this->estadocro = $estadocro;

        return $this;
    }
}
