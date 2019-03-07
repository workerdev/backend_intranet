<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Documento
 * @ORM\Table(name="cb_gestion_documento", indexes={@ORM\Index(name="cb_documento_id", columns={"cb_documento_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\DocumentoRepository")
 */
class Documento
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_documento_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="cb_documento_codigo", type="text", nullable=false)
     */
    private $codigo;

    /**
     * @var \ficha
     *
     * @ORM\ManyToOne(targetEntity="FichaProcesos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_documento_fkficha", referencedColumnName="cb_ficha_procesos_id")
     * })
     * @Assert\NotBlank
     */
    private $fkficha;
    
    /**
     * @var \tipo
     *
     * @ORM\ManyToOne(targetEntity="TipoDocumento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_documento_fktipo", referencedColumnName="cb_tipo_documento_id")
     * })
     * @Assert\NotBlank
     */
    private $fktipo;

    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="cb_documento_titulo", type="text", nullable=false)
     */
    private $titulo;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="numeric",
     *     message="Tiene que ingresar un valor numerico valido"
     * )
     * @ORM\Column(name="cb_documento_versionvigente", type="text", nullable=false)
     */
    private $versionvigente;

    /**
     * @var \aprobador
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_documento_fkaprobador", referencedColumnName="cb_usuario_id")
     * })
     * @Assert\NotBlank
     */
    private $fkaprobador;

    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="cb_documento_vinculoarchivodig", type="text", nullable=false)
     */
    private $vinculoarchivodig;

    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="cb_documento_vinculodiagflujo", type="text", nullable=false)
     */
    private $vinculodiagflujo;

    /**
     * @var date
     *  @Assert\NotBlank
     * @ORM\Column(name="cb_documento_fechaPublicacion", type="date", nullable=true)
     */
    private $fechaPublicacion;

    /**
     * @var string
     *  @Assert\NotBlank
     * @ORM\Column(name="cb_documento_carpetaOperativa", type="text", nullable=true)
     */
    private $carpetaOperativa;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_documento_estado", type="integer", nullable=false)
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

    public function getFkficha(): ?FichaProcesos
    {
        return $this->fkficha;
    }

    public function setFkficha(?FichaProcesos $fkficha): self
    {
        $this->fkficha = $fkficha;

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

    public function getFkaprobador(): ?Usuario
    {
        return $this->fkaprobador;
    }
    public function setFkaprobador(?Usuario $fkaprobador): self
    {
        $this->fkaprobador = $fkaprobador;

        return $this;
    }

    public function getVinculoarchivodig(): ?string
    {
        return $this->vinculoarchivodig;
    }

    public function setVinculoarchivodig(string $vinculoarchivodig): self
    {
        $this->vinculoarchivodig = $vinculoarchivodig;

        return $this;
    }

    public function getVinculodiagflujo(): ?string
    {
        return $this->vinculodiagflujo;
    }

    public function setVinculodiagflujo(string $vinculodiagflujo): self
    {
        $this->vinculodiagflujo = $vinculodiagflujo;

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

    public function getCarpetaOperativa(): ?string
    {
        return $this->carpetaOperativa;
    }

    public function setCarpetaOperativa(string $carpetaOperativa): self
    {
        $this->carpetaOperativa = $carpetaOperativa;

        return $this;
    }

    public function getFechaPublicacion(): ?\DateTimeInterface
    {
        return $this->fechaPublicacion;
    }

    public function setFechaPublicacion(\DateTimeInterface $fechaPublicacion): self
    {
        $this->fechaPublicacion = $fechaPublicacion;
        return $this;
    }
}
