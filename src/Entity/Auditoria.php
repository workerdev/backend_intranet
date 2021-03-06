<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Auditoria
 * @ORM\Table(name="cb_aud_auditoria", uniqueConstraints={@ORM\UniqueConstraint(name="cb_auditoria_id", columns={"cb_auditoria_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\AuditoriaRepository")
 */
class Auditoria
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_auditoria_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_auditoria_codigo", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $codigo;
    
    /**
     * @var \proceso
     *
     * @ORM\ManyToOne(targetEntity="FichaProcesos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_auditoria_fkproceso", referencedColumnName="cb_ficha_procesos_id")
     * })
     * @Assert\NotBlank
     */
    private $fkproceso;
    
    /**
     * @var \tipo
     *
     * @ORM\ManyToOne(targetEntity="TipoAuditoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_auditoria_fktipo", referencedColumnName="cb_tipo_auditoria_id")
     * })
     *
     * @Assert\NotBlank
     */
    private $fktipo;

    /**
     * @var date
     *
     * @ORM\Column(name="cb_auditoria_fechaprogramada", type="date", nullable=false)
     * @Assert\NotBlank
     */
    private $fechaprogramada;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_auditoria_duracionestimada", type="integer", nullable=false)
     * @Assert\NotBlank(
     *     message="El valor no puedo estar vacio y solo se admiten valores numericos"
     * )
     */
    private $duracionestimada;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_auditoria_lugar", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $lugar;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_auditoria_alcance", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $alcance;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_auditoria_objetivos", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $objetivos;

    /**
     * @var timestamp
     *
     * @ORM\Column(name="cb_auditoria_fechahorainicio", type="datetime", nullable=false)
     * @Assert\NotBlank
     */
    private $fechahorainicio;

    /**
     * @var timestamp
     *
     * @ORM\Column(name="cb_auditoria_fechahorafin", type="datetime", nullable=true)
     * @Assert\NotBlank
     */
    private $fechahorafin;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_auditoria_conclusiones", type="text", nullable=true)
     */
    private $conclusiones;

    /**
     * @var date
     *
     * @ORM\Column(name="cb_auditoria_fecharegistro", type="date", nullable=true)
     * @Assert\NotBlank
     */
    private $fecharegistro;
    
    /**
     * @var \gerente
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_auditoria_fkgerente", referencedColumnName="cb_usuario_id")
     * })
     *
     * @Assert\NotBlank
     */
    private $fkgerente;
    
    /**
     * @var \jefe
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_auditoria_fkjefe", referencedColumnName="cb_usuario_id")
     * })
     *
     * @Assert\NotBlank
     */
    private $fkjefe;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_auditoria_estado", type="integer", nullable=true)
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
    
    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }  

    public function getFkproceso(): ?FichaProcesos
    {
        return $this->fkproceso;
    }

    public function setFkproceso(?FichaProcesos $fkproceso): self
    {
        $this->fkproceso = $fkproceso;

        return $this;
    }   

    public function getFktipo(): ?TipoAuditoria
    {
        return $this->fktipo;
    }

    public function setFktipo(?TipoAuditoria $fktipo): self
    {
        $this->fktipo = $fktipo;

        return $this;
    }

    public function getFechaprogramada(): ?\DateTimeInterface
    {
        return $this->fechaprogramada;
    }

    public function setFechaprogramada(\DateTimeInterface $fechaprogramada): self
    {
        $this->fechaprogramada = $fechaprogramada;

        return $this;
    }

    public function getDuracionestimada(): ?int
    {
        return $this->duracionestimada;
    }

    public function setDuracionestimada(int $duracionestimada): self
    {
        $this->duracionestimada = $duracionestimada;

        return $this;
    }
    
    public function getLugar(): ?string
    {
        return $this->lugar;
    }

    public function setLugar(string $lugar): self
    {
        $this->lugar = $lugar;

        return $this;
    }
    
    public function getAlcance(): ?string
    {
        return $this->alcance;
    }

    public function setAlcance(string $alcance): self
    {
        $this->alcance = $alcance;

        return $this;
    }

    public function getObjetivos(): ?string
    {
        return $this->objetivos;
    }

    public function setObjetivos(string $objetivos): self
    {
        $this->objetivos = $objetivos;

        return $this;
    }

    public function getFechahorainicio(): ?\DateTimeInterface
    {
        return $this->fechahorainicio;
    }

    public function setFechahorainicio(\DateTimeInterface $fechahorainicio): self
    {
        $this->fechahorainicio = $fechahorainicio;

        return $this;
    }

    public function getFechahorafin(): ?\DateTimeInterface
    {
        return $this->fechahorafin;
    }

    public function setFechahorafin(\DateTimeInterface $fechahorafin): self
    {
        $this->fechahorafin = $fechahorafin;

        return $this;
    }

    public function getConclusiones(): ?string
    {
        return $this->conclusiones;
    }

    public function setConclusiones(string $conclusiones): self
    {
        $this->conclusiones = $conclusiones;

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

    public function getFkgerente(): ?Usuario
    {
        return $this->fkgerente;
    }

    public function setFkgerente(?Usuario $fkgerente): self
    {
        $this->fkgerente = $fkgerente;

        return $this;
    } 

    public function getFkjefe(): ?Usuario
    {
        return $this->fkjefe;
    }

    public function setFkjefe(?Usuario $fkjefe): self
    {
        $this->fkjefe = $fkjefe;

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