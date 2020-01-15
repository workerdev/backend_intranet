<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * DocumentoAudit
 * @ORM\Table(name="cb_aud_documentoaud", uniqueConstraints={@ORM\UniqueConstraint(name="cb_documentoaud_id", columns={"cb_documentoaud_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\DocumentoAuditRepository")
 */
class DocumentoAudit
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_documentoaud_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var \auditoria
     *
     * @ORM\ManyToOne(targetEntity="Auditoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_documentoaud_fkauditoria", referencedColumnName="cb_auditoria_id",nullable=false)
     * })
     * @Assert\NotBlank
     */
    private $fkauditoria;
    
    /**
     * @var \documento
     *
     * @ORM\ManyToOne(targetEntity="Documento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_documentoaud_fkdocumento", referencedColumnName="cb_documento_id",nullable=false)
     * })
     */
    private $fkdocumento;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_documentoaud_estado", type="integer", nullable=false)
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

    public function getFkauditoria(): ?Auditoria
    {
        return $this->fkauditoria;
    }

    public function setFkauditoria(?Auditoria $fkauditoria): self
    {
        $this->fkauditoria = $fkauditoria;

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