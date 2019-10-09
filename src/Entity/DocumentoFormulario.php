<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * DocumentoFormulario
 * @ORM\Table(name="cb_gest_doc_formulario", uniqueConstraints={@ORM\UniqueConstraint(name="cb_documento_formulario_id", columns={"cb_documento_formulario_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\DocumentoFormularioRepository")
 */
class DocumentoFormulario
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_documento_formulario_id", type="integer", nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var \documento
     * 
     *
     * @ORM\ManyToOne(targetEntity="Documento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_documento_formulario_fkdocumento", referencedColumnName="cb_documento_id")
     * })
     * @Assert\NotBlank
     */
    private $fkdocumento;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_documento_formulario_codigo", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $codigo;

     /**
     * @var string
     *
     * @ORM\Column(name="cb_documento_formulario_titulo", type="text", nullable=false)
      * @Assert\NotBlank
     */
    private $titulo;

    /**
    * @var string
    *
    * @ORM\Column(name="cb_documento_formulario_versionVigente", type="text", nullable=false)
     * @Assert\NotBlank
    */
   private $versionVigente;

    /**
     * @var timestamp
     *
     * @ORM\Column(name="cb_documento_formulario_fechaPublicacion", type="datetime", nullable=true)
     * @Assert\NotBlank
     */
    private $fechaPublicacion;

    /**
     * @var \aprobador
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_documento_formulario_fkaprobador", referencedColumnName="cb_usuario_id")
     * })
     * @Assert\NotBlank
     */
    private $fkaprobador;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_documento_formulario_vinculoFileDig", type="text", nullable=true)
     */
    private $vinculoFileDig;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_documento_formulario_vinculoFileDesc", type="text", nullable=true)
     */
    private $vinculoFileDesc;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_documento_formulario_estado", type="integer", nullable=false)
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

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

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

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }   

    public function getVersionVigente(): ?string
    {
        return $this->versionVigente;
    }

    public function setVersionVigente(string $versionVigente): self
    {
        $this->versionVigente = $versionVigente;

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

    public function getFkaprobador(): ?Usuario
    {
        return $this->fkaprobador;
    }
    
    public function setFkaprobador(?Usuario $fkaprobador): self
    {
        $this->fkaprobador = $fkaprobador;

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

    public function getVinculoFileDig(): ?string
    {
        return $this->vinculoFileDig;
    }

    public function setVinculoFileDig(string $vinculoFileDig): self
    {
        $this->vinculoFileDig = $vinculoFileDig;

        return $this;
    }   

    public function getVinculoFileDesc(): ?string
    {
        return $this->vinculoFileDesc;
    }

    public function setVinculoFileDesc(string $vinculoFileDesc): self
    {
        $this->vinculoFileDesc = $vinculoFileDesc;

        return $this;
    }   
}