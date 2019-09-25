<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * DocumentoProceso
 * @ORM\Table(name="cb_gest_doc_proceso", uniqueConstraints={@ORM\UniqueConstraint(name="cb_documento_proceso_id", columns={"cb_documento_proceso_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\DocumentoProcesoRepository")
 */

class DocumentoProceso
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_documento_proceso_id", type="integer", nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_documento_proceso_nuevoactualizacion", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $nuevoactualizacion;

    /**
     * @var \documento
     *
     * @ORM\ManyToOne(targetEntity="Documento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_documento_proceso_fkdocumento", referencedColumnName="cb_documento_id")
     * })
     */
    private $fkdocumento;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_documento_proceso_codigonuevo", type="text", nullable=true)
     */
    private $codigonuevo;

    /**
     * @var \formulario
     *
     * @ORM\ManyToOne(targetEntity="DocumentoFormulario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_documento_proceso_fkformulario", referencedColumnName="cb_documento_formulario_id")
     * })
     */
    private $fkformulario;
    
    /**
     * @var \proceso
     *
     * @ORM\ManyToOne(targetEntity="FichaProcesos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_documento_proceso_fkproceso", referencedColumnName="cb_ficha_procesos_id")
     * })
     * @Assert\NotBlank
     */
    private $fkproceso;
    
    /**
     * @var \tipo
     *
     * @ORM\ManyToOne(targetEntity="TipoDocumento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_documento_proceso_fktipo", referencedColumnName="cb_tipo_documento_id")
     * })
     * @Assert\NotBlank
     */
    private $fktipo;

     /**
     * @var string
     *
     * @ORM\Column(name="cb_documento_proceso_titulo", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $titulo;

     /**
     * @var string
     *
     * @ORM\Column(name="cb_documento_proceso_versionvigente", type="text", nullable=false)
      * @Assert\NotBlank
     */
    private $versionvigente;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_documento_proceso_vinculoarchivo", type="text", nullable=true)
     */
    private $vinculoarchivo;

    /**
     * @var string
     * @ORM\Column(name="cb_documento_proceso_carpetaoperativa", type="text", nullable=true, options={"default":""})
     */
    private $carpetaoperativa;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_documento_proceso_aprobadorechazado", type="text", nullable=true)
     */
    private $aprobadorechazado;

    /**
     * @var \aprobador
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_documento_proceso_fkaprobador", referencedColumnName="cb_usuario_id", nullable=true)
     * })
     */
    private $fkaprobador;
    
    /**
     * @var timestamp
     *
     * @ORM\Column(name="cb_documento_proceso_fechaaprobacion", type="datetime", nullable=true, options={"default":null})
     */
    private $fechaaprobacion;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_documento_proceso_estado", type="integer", nullable=false)
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
    
    public function getNuevoactualizacion(): ?string
    {
        return $this->nuevoactualizacion;
    }

    public function setNuevoactualizacion(string $nuevoactualizacion): self
    {
        $this->nuevoactualizacion = $nuevoactualizacion;

        return $this;
    } 

    public function getFkdocumento(): ?Documento
    {
        return $this->fkdocumento;
    }

    public function setFkdocumento(?Documento $fkdocumento): self
    {
        $this->fkdocumento = $fkdocumento;

        return $this;
    }  

    public function getFkformulario(): ?DocumentoFormulario
    {
        return $this->fkformulario;
    }

    public function setFkformulario(?DocumentoFormulario $fkformulario): self
    {
        $this->fkformulario = $fkformulario;

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

    public function getFktipo(): ?TipoDocumento
    {
        return $this->fktipo;
    }

    public function setFktipo(?TipoDocumento $fktipo): self
    {
        $this->fktipo = $fktipo;

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
      
    public function getVersionvigente(): ?string
    {
        return $this->versionvigente;
    }

    public function setVersionvigente(string $versionvigente): self
    {
        $this->versionvigente = $versionvigente;

        return $this;
    }   

    public function getVinculoarchivo(): ?string
    {
        return $this->vinculoarchivo;
    }

    public function setVinculoarchivo(string $vinculoarchivo): self
    {
        $this->vinculoarchivo = $vinculoarchivo;

        return $this;
    }

    public function getCarpetaoperativa(): ?string
    {
        return $this->carpetaoperativa;
    }

    public function setCarpetaoperativa(string $carpetaoperativa): self
    {
        $this->carpetaoperativa = $carpetaoperativa;

        return $this;
    }  


    public function getCodigonuevo(): ?string
    {
        return $this->codigonuevo;
    }

    public function setCodigonuevo(string $codigonuevo): self
    {
        $this->codigonuevo = $codigonuevo;

        return $this;
    } 

    public function getAprobadorechazado(): ?string
    {
        return $this->aprobadorechazado;
    }

    public function setAprobadorechazado(string $aprobadorechazado): self
    {
        $this->aprobadorechazado = $aprobadorechazado;

        return $this;
    } 

    public function getFkaprobador(): ?Usuario
    {
        return $this->fkaprobador;
    }
    public function setFkaprobador(?Usuario $fkaprobador): self
    {
        $this->fkaprobador = $fkaprobador;

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