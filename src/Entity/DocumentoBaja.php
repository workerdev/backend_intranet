<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * DocumentoBaja
 * @ORM\Table(name="cb_gest_bajadocumento", indexes={@ORM\Index(name="cb_bajadocumento_id", columns={"cb_bajadocumento_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\DocumentoBajaRepository")
 */
class DocumentoBaja
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_bajadocumento_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_bajadocumento_codigo", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $codigo;

    /**
     * @var \proceso
     *
     * @ORM\ManyToOne(targetEntity="FichaProcesos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_bajadocumento_fkproceso", referencedColumnName="cb_ficha_procesos_id", nullable=true)
     * })
     * @Assert\NotBlank
     */
    private $fkproceso;

    /**
     * @var \tipo
     *
     * @ORM\ManyToOne(targetEntity="TipoDocumento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_bajadocumento_fktipo", referencedColumnName="cb_tipo_documento_id")
     * })
     * @Assert\NotBlank
     */
    private $fktipo;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_bajadocumento_titulo", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $titulo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_bajadocumento_versionvigente", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $versionvigente;
    
    /**
     * @var timestamp
     *
     * @ORM\Column(name="cb_bajadocumento_fechapublicacion", type="datetime", nullable=true)
     * @Assert\NotBlank
     */
    private $fechapublicacion;
    
    /**
     * @var \aprobador
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_bajadocumento_fkaprobador", referencedColumnName="cb_usuario_id")
     * })
     * @Assert\NotBlank
     */
    private $fkaprobador;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_bajadocumento_carpetaoperativa", type="string", length=10, nullable=true)
     */
    private $carpetaoperativa;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_bajadocumento_vinculoarchivo", type="text", nullable=true)
     */
    private $vinculoarchivo;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_bajadocumento_estado", type="integer", nullable=false)
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

    public function getFechapublicacion(): ?\DateTimeInterface
    {
        return $this->fechapublicacion;
    }

    public function setFechapublicacion(\DateTimeInterface $fechapublicacion): self
    {
        $this->fechapublicacion = $fechapublicacion;
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

    public function getCarpetaoperativa(): ?string
    {
        return $this->carpetaoperativa;
    }

    public function setCarpetaoperativa(string $carpetaoperativa): self
    {
        $this->carpetaoperativa = $carpetaoperativa;

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