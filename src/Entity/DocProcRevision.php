<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * DocProcRevision
 * @ORM\Table(name="cb_gest_docprocrevision", uniqueConstraints={@ORM\UniqueConstraint(name="cb_docprocrevision_id", columns={"cb_docprocrevision_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\DocProcRevisionRepository")
 */
class DocProcRevision
{
     /**
     * @var int
     *
     * @ORM\Column(name="cb_docprocrevision_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \doc
     *
     * @ORM\ManyToOne(targetEntity="DocumentoProceso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_docprocrevision_fkdoc", referencedColumnName="cb_documento_proceso_id")
     * })
     * @Assert\NotBlank
     */
    private $fkdoc; 
    
   /**
    * @var date
    *
    * @ORM\Column(name="cb_docprocrevision_fecha", type="date", nullable=true, nullable=true, options={"default":null})
    */
    private $fecha;

    /**
     * @var \responsable
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_docprocrevision_fkresponsable", referencedColumnName="cb_usuario_id", nullable=true)
     * })
     */
    private $fkresponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_docprocrevision_firma", type="string", length=50, nullable=true)
     */
    private $firma;

         /**
     * @var string
     *
     * @ORM\Column(name="cb_docprocrevision_estadodoc", type="string", length=50, nullable=true)
     */
    private $estadodoc;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_docprocrevision_estado", type="integer", nullable=false)
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

    public function getFkdoc(): ?DocumentoProceso
    {
        return $this->fkdoc;
    }

    public function setFkdoc(?DocumentoProceso $fkdoc): self
    {
        $this->fkdoc = $fkdoc;
        return $this;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }
    
    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
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
    public function getFirma(): ?string
    {
        return $this->firma;
    }

    public function setFirma(string $firma): self
    {
        $this->firma = $firma;

        return $this;
    }

    public function getEstadodoc(): ?string
    {
        return $this->estadodoc;
    }

    public function setEstadodoc(string $estadodoc): self
    {
        $this->estadodoc = $estadodoc;

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
