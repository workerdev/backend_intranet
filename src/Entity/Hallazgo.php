<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Hallazgo
 * @ORM\Table(name="cb_aud_hallazgo", indexes={@ORM\Index(name="cb_hallazgo_id", columns={"cb_hallazgo_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\HallazgoRepository")
 */

class Hallazgo
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_hallazgo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \auditoria
     *
     * @ORM\ManyToOne(targetEntity="Auditoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_hallazgo_fkauditoria", referencedColumnName="cb_auditoria_id")
     * })
     * @Assert\NotBlank
     */
    private $fkauditoria;

    /**
     * @var \tipo
     *
     * @ORM\ManyToOne(targetEntity="TipoHallazgo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_hallazgo_fktipo", referencedColumnName="cb_tipo_hallazgo_id")
     * })
     * @Assert\NotBlank
     */
    private $fktipo;    

    /**
     * @var int
     *
     * @ORM\Column(name="cb_hallazgo_ordinal", type="integer", nullable=false)
     * @Assert\NotBlank(
     *     message = "Este valor no deberia estar vacio, solo se aceptan valores numericos"
     * )
     */
    private $ordinal;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_hallazgo_titulo", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_hallazgo_descripcion", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $descripcion;
    
      /**
     * @var string
     *
     * @ORM\Column(name="cb_hallazgo_evidencia", type="text", nullable=true)
       * @Assert\NotBlank
     */
    private $evidencia;

      /**
     * @var string
     *
     * @ORM\Column(name="cb_hallazgo_documento", type="text", nullable=true)
       * @Assert\NotBlank
     */
    private $documento;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_hallazgo_puntoiso", type="text", nullable=true)
     * @Assert\NotBlank
     */
    private $puntoiso;

    /**
     * @var \impacto
     *
     * @ORM\ManyToOne(targetEntity="Impacto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_hallazgo_fkimpacto", referencedColumnName="cb_impacto_id")
     * })
     * @Assert\NotBlank
     */
    private $fkimpacto;

    /**
     * @var \probabilidad
     *
     * @ORM\ManyToOne(targetEntity="Probabilidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_hallazgo_fkprobabilidad", referencedColumnName="cb_probabilidad_ocurrencia_id")
     * })
     * @Assert\NotBlank
     */
    private $fkprobabilidad;  

    /**
     * @var string
     *
     * @ORM\Column(name="cb_hallazgo_analisiscausaraiz", type="text", nullable=true)
     * @Assert\NotBlank
     */
    private $analisiscausaraiz;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_hallazgo_recomendaciones", type="text", nullable=true)
     * @Assert\NotBlank
     */
    private $recomendaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_hallazgo_cargoauditado", type="text", nullable=true)
     * @Assert\NotBlank
     */
    private $cargoauditado;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_hallazgo_nombreauditado", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $nombreauditado;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_hallazgo_responsable", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $responsable;

    /**
     * @var datetime
     *
     * @ORM\Column(name="cb_hallazgo_fecharegistro", type="date", nullable=true)
     * @Assert\NotBlank
     */
    private $fecharegistro;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_hallazgo_estado", type="integer", nullable=false)
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
    
    public function getFkauditoria(): ?Auditoria
    {
        return $this->fkauditoria;
    }

    public function setFkauditoria(?Auditoria $fkauditoria): self
    {
        $this->fkauditoria = $fkauditoria;

        return $this;
    }
    
    public function getFktipo(): ?TipoHallazgo
    {
        return $this->fktipo;
    }

    public function setFktipo(?TipoHallazgo $fktipo): self
    {
        $this->fktipo = $fktipo;

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

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

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

    public function getEvidencia(): ?string
    {
        return $this->evidencia;
    }

    public function setEvidencia(string $evidencia): self
    {
        $this->evidencia = $evidencia;

        return $this;
    }

    public function getDocumento(): ?string
    {
        return $this->documento;
    }

    public function setDocumento(string $documento): self
    {
        $this->documento = $documento;

        return $this;
    }

    public function getPuntoiso(): ?string
    {
        return $this->puntoiso;
    }

    public function setPuntoiso(string $puntoiso): self
    {
        $this->puntoiso = $puntoiso;

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
    
    public function getFkprobabilidad(): ?Probabilidad
    {
        return $this->fkprobabilidad;
    }

    public function setFkprobabilidad(?Probabilidad $fkprobabilidad): self
    {
        $this->fkprobabilidad = $fkprobabilidad;

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

    public function getRecomendaciones(): ?string
    {
        return $this->recomendaciones;
    }

    public function setRecomendaciones(string $recomendaciones): self
    {
        $this->recomendaciones = $recomendaciones;

        return $this;
    }

    public function getCargoauditado(): ?string
    {
        return $this->cargoauditado;
    }

    public function setCargoauditado(string $cargoauditado): self
    {
        $this->cargoauditado = $cargoauditado;

        return $this;
    }

    public function getNombreauditado(): ?string
    {
        return $this->nombreauditado;
    }

    public function setNombreauditado(string $nombreauditado): self
    {
        $this->nombreauditado = $nombreauditado;

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