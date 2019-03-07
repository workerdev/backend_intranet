<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * DocumentoExtra
 * @ORM\Table(name="cb_gest_documento_extra", indexes={@ORM\Index(name="cb_documento_extra_id", columns={"cb_documento_extra_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\DocumentoExtraRepository")
 */
class DocumentoExtra
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_documento_extra_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="cb_documento_extra_codigo", type="text", nullable=false)
     */ 
    private $codigo;
    
    /**
     * @var \proceso
     * @Assert\NotBlank
     * @ORM\ManyToOne(targetEntity="FichaProcesos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_documento_extra_fkproceso", referencedColumnName="cb_ficha_procesos_id")
     * })
     */
    private $fkproceso;
    
    /**
     * @var \tipo
     *
     * @ORM\ManyToOne(targetEntity="DocTipoExtra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_documento_extra_fktipo", referencedColumnName="cb_doc_tipoextra_id")
     * })
     * @Assert\NotBlank
     */
    private $fktipo;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_documento_extra_titulo", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $titulo;
    
    /**
     * @var date
     *
     * @ORM\Column(name="cb_documento_extra_fechapublicacion", type="date", nullable=true)
     * @Assert\NotBlank
     */
    private $fechapublicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_documento_extra_vigente", type="text", nullable=true)
     * @Assert\NotBlank
     */
    private $vigente;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_documento_extra_vinculoarchivo", type="text", nullable=true)
     * @Assert\NotBlank
     */
    private $vinculoarchivo;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_documento_extra_estado", type="integer", nullable=false)
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
    public function getFktipo(): ?DocTipoExtra
    {
        return $this->fktipo;
    }

    public function setFktipo(?DocTipoExtra $fktipo): self
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
    public function getVigente(): ?string
    {
        return $this->vigente;
    }

    public function setVigente(string $vigente): self
    {
        $this->vigente = $vigente;

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
    public function getFechapublicacion(): ?\DateTimeInterface
    {
        return $this->fechapublicacion;
    }

    public function setFechapublicacion(\DateTimeInterface $fechapublicacion): self
    {
        $this->fechapublicacion = $fechapublicacion;
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
