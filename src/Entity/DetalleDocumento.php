<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleDocumento
 * @ORM\Table(name="cb_auditoria_detalle_documento", indexes={@ORM\Index(name="cb_detalle_documento_id", columns={"cb_detalle_documento_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\DetalleDocumentoRepository")
 */
class DetalleDocumento
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_detalle_documento_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \auditoria
     *
     * @ORM\ManyToOne(targetEntity="Auditoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_detalle_documento_fkauditoria", referencedColumnName="cb_auditoria_id")
     * })
     */
    private $fkauditoria;
    /**
     * @var \documento
     *
     * @ORM\ManyToOne(targetEntity="DocumentoExtra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_detalle_documento_fkdocumento", referencedColumnName="cb_documento_extra_id")
     * })
     */
    private $fkdocumento;

   
    /**
     * @var int
     *
     * @ORM\Column(name="cb_detalle_documento_estado", type="integer", nullable=false)
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
    public function getFkdocumento(): ?DocumentoExtra
    {
        return $this->fkdocumento;
    }

    public function setFkdocumento(?DocumentoExtra $fkdocumento): self
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
